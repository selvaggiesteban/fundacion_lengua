<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Accomodation;
use App\Models\AccountingEntry;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();
        
        $filterPaymentStatus = $request->input('filter_payment_status');
        
        if ($filterPaymentStatus && $filterPaymentStatus !== '') {
            $query->where('payment_status', $filterPaymentStatus);
        }
        
        $students = $query->with('accomodations')->latest()->paginate(15);
        
        return view('admin.students.index', [
            'students' => $students,
            'selectedPaymentStatus' => $filterPaymentStatus
        ]);
    }

    public function create()
    {
        return view('admin.students.create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'nullable|string|in:active,inactive',
            'payment_status' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'user_level' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'passport' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'center' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'second_language' => 'nullable|string|max:255',
            'birthdate' => 'required|date',
            'partner' => 'nullable|string|max:255',
            'phone' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $studentData = $request->only([
            'name', 'email', 'passport', 'postal_code', 'language', 'center', 'level',
            'address', 'city', 'second_language', 'birthdate', 'partner', 'phone',
            'country', 'province', 'sex', 'payment_status', 'start_date', 'end_date', 'user_level'
        ]);
        
        $studentData['status'] = $request->has('status') ? 'active' : 'inactive';
        
        $student = Student::create($studentData);
        
        return redirect()->route('admin.students.edit', $student->id)->with('success', 'Estudiante agregado con éxito. Ahora puedes editarlo.');
    }
    
    public function show(Student $student)
    {
        $student->load(['accomodations', 'accountingEntries']);
        return view('admin.students.show', compact('student'));
    }
    
    public function edit(Student $student)
    {
        $accommodations = Accomodation::all();
        $student->load('accountingEntries');
        return view('admin.students.edit', compact('student', 'accommodations'));
    }
    
    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'passport' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'center' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'second_language' => 'nullable|string|max:255',
            'birthdate' => 'required|date',
            'partner' => 'nullable|string|max:255',
            'phone' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
            'status' => 'nullable|string|in:active,inactive',
            'payment_status' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'user_level' => 'nullable|string|max:255',
            'accommodations' => 'nullable|array',
            'accommodations.*' => 'exists:accomodations,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $dataToUpdate = $request->only($student->getFillable());
        
        if (in_array('status', $student->getFillable())) {
             $dataToUpdate['status'] = $request->has('status') ? 'active' : 'inactive';
        } else {
            unset($dataToUpdate['status']);
        }
        
        $student->update($dataToUpdate);
        
        // Sincronizar alojamientos asignados
        if ($request->has('accommodations')) {
            $student->accomodations()->sync($request->input('accommodations', []));
        } else {
            $student->accomodations()->detach();
        }
        
        return redirect()->route('admin.students.edit', $student->id)->with('success', 'Estudiante actualizado con éxito');
    }

    public function destroy(Student $student)
    {
        try {
            $studentName = $student->name;
            $student->delete();
            return redirect()->route('admin.students.index')->with('success', "Estudiante '{$studentName}' eliminado con éxito.");
        } catch (\Exception $e) {
            return redirect()->route('admin.students.index')->with('error', 'Error al eliminar el estudiante: ' . $e->getMessage());
        }
    }

    public function storeAccountingEntry(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'entry_date' => 'required|date',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'amount_type' => 'required|in:debit,credit',
            'entry_type' => 'required|in:payment,charge,adjustment,invoice,order',
            'reference_number' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }

        try {
            DB::transaction(function () use ($request, $student) {
                $currentBalance = $student->current_balance;
                
                $entryData = [
                    'student_id' => $student->id,
                    'entry_date' => $request->entry_date,
                    'description' => $request->description,
                    'entry_type' => $request->entry_type,
                    'reference_number' => $request->reference_number,
                    'notes' => $request->notes,
                    'created_by' => Auth::user()->name ?? 'Admin',
                ];

                if ($request->amount_type === 'debit') {
                    $entryData['debit_amount'] = $request->amount;
                    $entryData['balance'] = $currentBalance - $request->amount;
                } else {
                    $entryData['credit_amount'] = $request->amount;
                    $entryData['balance'] = $currentBalance + $request->amount;
                }

                AccountingEntry::create($entryData);
            });

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al crear el asiento contable: ' . $e->getMessage()]);
        }
    }

    public function generatePaymentOrder(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0.01',
            'description' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }

        try {
            DB::transaction(function () use ($request, $student) {
                $orderData = [
                    'user_id' => $student->id,
                    'order_number' => 'ORD-' . time() . '-' . $student->id,
                    'order_date' => now(),
                    'total_amount' => $request->amount,
                    'description' => $request->description ?? 'Pago generado desde gestión contable',
                    'status' => 'pending',
                    'payment_status' => Order::PAYMENT_STATUS_PENDING ?? 'pending',
                    'full_name' => $student->name,
                    'email' => $student->email,
                    'phone_number' => $student->phone,
                    'passport_number' => $student->passport,
                ];

                $order = Order::create($orderData);
                $order->generateRedsysOrderId();

                AccountingEntry::create([
                    'student_id' => $student->id,
                    'entry_date' => now(),
                    'description' => 'Orden de pago generada: ' . $order->order_number,
                    'debit_amount' => $request->amount,
                    'balance' => $student->current_balance - $request->amount,
                    'entry_type' => 'order',
                    'reference_number' => $order->order_number,
                    'created_by' => Auth::user()->name ?? 'Admin',
                ]);
            });

            $order = Order::where('order_number', 'LIKE', 'ORD-' . time() . '-%')->latest()->first();
            $redirectUrl = route('payment.initiate', $order);

            return response()->json([
                'success' => true, 
                'redirect_url' => $redirectUrl,
                'message' => 'Orden de pago creada exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al generar orden de pago: ' . $e->getMessage()]);
        }
    }
}