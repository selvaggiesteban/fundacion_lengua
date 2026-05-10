<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    /**
     * Initiate payment process for an order
     */
    public function initiatePayment(Order $order)
    {
        try {
            // Verify order can be paid
            if ($order->payment_status === Order::PAYMENT_STATUS_COMPLETED) {
                return redirect()->route('payment.success')
                    ->with('message', 'Esta orden ya ha sido pagada.');
            }

            // Generate RedSys order ID if not exists
            if (!$order->redsys_order_id) {
                $order->generateRedsysOrderId();
            }

            // Update payment status to processing
            $order->updatePaymentStatus(Order::PAYMENT_STATUS_PROCESSING);

            // Prepare RedSys parameters
            $params = $this->prepareRedsysParams($order);

            Log::info('Initiating payment for order: ' . $order->id, $params);

            return view('payment.redirect', compact('params', 'order'));

        } catch (\Exception $e) {
            Log::error('Error initiating payment for order ' . $order->id . ': ' . $e->getMessage());
            
            return redirect()->route('payment.error')
                ->with('error', 'Error al procesar el pago. Inténtelo de nuevo.');
        }
    }

    /**
     * Handle RedSys response (webhook)
     */
    public function processPaymentResponse(Request $request)
    {
        try {
            Log::info('RedSys response received', $request->all());

            // Validate RedSys response
            $validator = Validator::make($request->all(), [
                'Ds_MerchantParameters' => 'required|string',
                'Ds_Signature' => 'required|string',
                'Ds_SignatureVersion' => 'required|string',
            ]);

            if ($validator->fails()) {
                Log::error('Invalid RedSys response format', $validator->errors()->toArray());
                return response('Invalid request', 400);
            }

            // Decode merchant parameters
            $merchantParams = base64_decode($request->Ds_MerchantParameters);
            $responseData = json_decode($merchantParams, true);

            if (!$responseData) {
                Log::error('Failed to decode merchant parameters');
                return response('Invalid merchant parameters', 400);
            }

            // Verify signature
            if (!$this->verifySignature($request->Ds_MerchantParameters, $request->Ds_Signature)) {
                Log::error('Invalid signature in RedSys response');
                return response('Invalid signature', 400);
            }

            // Find order by RedSys order ID
            $redsysOrderId = $responseData['Ds_Order'] ?? null;
            $order = Order::where('redsys_order_id', $redsysOrderId)->first();

            if (!$order) {
                Log::error('Order not found for RedSys ID: ' . $redsysOrderId);
                return response('Order not found', 404);
            }

            // Process payment result
            $this->processPaymentResult($order, $responseData);

            return response('OK', 200);

        } catch (\Exception $e) {
            Log::error('Error processing RedSys response: ' . $e->getMessage());
            return response('Internal error', 500);
        }
    }

    /**
     * Success page
     */
    public function success(Request $request)
    {
        return view('payment.success');
    }

    /**
     * Error page
     */
    public function error(Request $request)
    {
        return view('payment.error');
    }

    /**
     * Prepare RedSys parameters for payment
     */
    private function prepareRedsysParams(Order $order)
    {
        $merchantParameters = [
            'DS_MERCHANT_AMOUNT' => intval($order->total_amount * 100), // Convert to cents
            'DS_MERCHANT_ORDER' => $order->redsys_order_id,
            'DS_MERCHANT_MERCHANTCODE' => config('services.redsys.merchant_code'),
            'DS_MERCHANT_TERMINAL' => config('services.redsys.terminal'),
            'DS_MERCHANT_TRANSACTIONTYPE' => '0', // Payment
            'DS_MERCHANT_CURRENCY' => config('services.redsys.currency'),
            'DS_MERCHANT_URLOK' => route('payment.success'),
            'DS_MERCHANT_URLKO' => route('payment.error'),
            'DS_MERCHANT_MERCHANTURL' => route('payment.response'),
            'DS_MERCHANT_PRODUCTDESCRIPTION' => 'Curso de idiomas - ' . $order->course_type,
            'DS_MERCHANT_CONSUMERLANGUAGE' => '001', // Spanish
        ];

        $merchantParamsJson = json_encode($merchantParameters);
        $merchantParamsBase64 = base64_encode($merchantParamsJson);

        // Generate signature
        $signature = $this->generateSignature($merchantParamsBase64, $order->redsys_order_id);

        return [
            'Ds_SignatureVersion' => 'HMAC_SHA256_V1',
            'Ds_MerchantParameters' => $merchantParamsBase64,
            'Ds_Signature' => $signature,
            'action_url' => $this->getRedsysUrl(),
        ];
    }

    /**
     * Generate RedSys signature
     */
    private function generateSignature($merchantParameters, $orderNumber)
    {
        $key = base64_decode(config('services.redsys.secret_key'));
        $iv = "\0\0\0\0\0\0\0\0";
        
        // Encrypt order number
        $orderPadded = str_pad($orderNumber, 16, "\0");
        $orderEncrypted = openssl_encrypt($orderPadded, 'DES-EDE3-CBC', $key, OPENSSL_RAW_DATA, $iv);
        
        // Generate HMAC
        $signature = hash_hmac('sha256', $merchantParameters, $orderEncrypted, true);
        
        return base64_encode($signature);
    }

    /**
     * Verify RedSys signature
     */
    private function verifySignature($merchantParameters, $signature)
    {
        // Decode parameters to get order number
        $decodedParams = json_decode(base64_decode($merchantParameters), true);
        $orderNumber = $decodedParams['Ds_Order'] ?? '';

        $expectedSignature = $this->generateSignature($merchantParameters, $orderNumber);
        
        return hash_equals($signature, $expectedSignature);
    }

    /**
     * Get RedSys URL based on environment
     */
    private function getRedsysUrl()
    {
        $environment = config('services.redsys.environment');
        return config('services.redsys.urls.' . $environment);
    }

    /**
     * Process payment result and update order
     */
    private function processPaymentResult(Order $order, array $responseData)
    {
        $resultCode = $responseData['Ds_Response'] ?? '';
        $transactionId = $responseData['Ds_AuthorisationCode'] ?? '';

        Log::info('Processing payment result for order ' . $order->id, [
            'result_code' => $resultCode,
            'transaction_id' => $transactionId
        ]);

        // Update order with transaction ID
        $order->update([
            'payment_transaction_id' => $transactionId,
            'payment_response_data' => $responseData,
        ]);

        // Check result code
        if ($resultCode >= '0000' && $resultCode <= '0099') {
            // Payment successful
            $order->updatePaymentStatus(Order::PAYMENT_STATUS_COMPLETED, $responseData);
            
            Log::info('Payment completed successfully for order: ' . $order->id);
            
            // Trigger conversion to student
            $this->convertOrderToStudent($order);
            
        } else {
            // Payment failed
            $order->updatePaymentStatus(Order::PAYMENT_STATUS_FAILED, $responseData);
            
            Log::warning('Payment failed for order: ' . $order->id . ' with code: ' . $resultCode);
        }
    }

    /**
     * Convert order to student after successful payment
     */
    private function convertOrderToStudent(Order $order)
    {
        try {
            // This will be implemented in OrderToStudentService
            app(\App\Services\OrderToStudentService::class)->convert($order);
            
        } catch (\Exception $e) {
            Log::error('Error converting order to student: ' . $e->getMessage());
            // Don't fail the payment, but log the error for manual processing
        }
    }
}
