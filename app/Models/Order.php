<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentCredentials;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'order_number',
        'order_date',
        'total_amount',
        'status',
        'payment_method',
        'description',
        // Payment fields
        'payment_transaction_id',
        'payment_status',
        'payment_response_data',
        'redsys_order_id',
        // Nuevas columnas de Tipo de Curso
        'course_type',
        'accommodation',
        'weeks',
        'start_date',
        'insurance',
        'transport',
        'parking_available',
        'cancellation_policy',
        'university_certificate_ects',
        'destination',
        'discount_code',
        // Nuevas columnas de Datos Personales
        'full_name',
        'email',
        'phone_number',
        'passport_number',
        'address',
        'country',
        'postal_code',
        'city',
        'province',
        'language',
        'second_language',
        'spanish_level',
        'study_center_name',
        'birth_date',
        'gender',
        'smoking_preference',
        'pets_preference',
        'notes',
    ];

    protected $casts = [
        'order_date' => 'datetime',
        'total_amount' => 'decimal:2',
        'start_date' => 'date',
        'birth_date' => 'date',
        'insurance' => 'boolean',
        'transport' => 'boolean',
        'parking_available' => 'boolean',
        'cancellation_policy' => 'boolean',
        'university_certificate_ects' => 'boolean',
        'smoking_preference' => 'boolean',
        'pets_preference' => 'boolean',
        'payment_response_data' => 'json',
    ];

    // Constantes para los estados del pedido
    const STATUS_PENDING = 'pendiente';
    const STATUS_PROCESSING = 'procesando';
    const STATUS_CANCELED = 'cancelado';
    const STATUS_PAID = 'pagado';
    const STATUS_SENT = 'enviado';
    const STATUS_SERVED = 'servido';
    const STATUS_RETURNED = 'devolucion';

    // Array de todos los estados posibles para validación y uso en vistas
    const STATUSES = [
        self::STATUS_PENDING => 'Pendiente',
        self::STATUS_PROCESSING => 'Procesando Pago',
        self::STATUS_CANCELED => 'Cancelado',
        self::STATUS_PAID => 'Pagado',
        self::STATUS_SENT => 'Enviado',
        self::STATUS_SERVED => 'Servido',
        self::STATUS_RETURNED => 'Devolución',
    ];

    // Constantes para los estados de pago
    const PAYMENT_STATUS_PENDING = 'pending';
    const PAYMENT_STATUS_PROCESSING = 'processing';
    const PAYMENT_STATUS_COMPLETED = 'completed';
    const PAYMENT_STATUS_FAILED = 'failed';

    // Array de estados de pago
    const PAYMENT_STATUSES = [
        self::PAYMENT_STATUS_PENDING => 'Pendiente',
        self::PAYMENT_STATUS_PROCESSING => 'Procesando',
        self::PAYMENT_STATUS_COMPLETED => 'Completado',
        self::PAYMENT_STATUS_FAILED => 'Fallido',
    ];

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Update the payment status of the order.
     */
    public function updatePaymentStatus($status, $responseData = null)
    {
        $this->update([
            'payment_status' => $status,
            'payment_response_data' => $responseData,
        ]);

        // Update order status based on payment status
        if ($status === self::PAYMENT_STATUS_COMPLETED) {
            $this->update(['status' => self::STATUS_PAID]);
            
            // Create student account and send credentials after successful payment
            $this->createStudentAccountAndSendCredentials();
        } elseif ($status === self::PAYMENT_STATUS_PROCESSING) {
            $this->update(['status' => self::STATUS_PROCESSING]);
        } elseif ($status === self::PAYMENT_STATUS_FAILED) {
            $this->update(['status' => self::STATUS_PENDING]);
        }
    }

    /**
     * Generate a unique RedSys order ID for this order.
     */
    public function generateRedsysOrderId()
    {
        $redsysOrderId = 'FLE' . str_pad($this->id, 8, '0', STR_PAD_LEFT);
        $this->update(['redsys_order_id' => $redsysOrderId]);
        return $redsysOrderId;
    }

    /**
     * Create student account and send credentials after successful payment
     */
    public function createStudentAccountAndSendCredentials()
    {
        // Check if user already exists or if order has no user_id
        if ($this->user_id) {
            $user = $this->user;
            
            // If user is already a student with student_id, don't create again
            if ($user->isStudent() && $user->student_id) {
                return;
            }
        }
        
        // Create new student user from order data
        $password = $this->generateRandomPassword();
        
        $user = User::updateOrCreate(
            ['email' => $this->email], // Find by email from order
            [
                'name' => $this->full_name ?: 'Estudiante',
                'password' => Hash::make($password),
                'role' => User::ROLE_STUDENT,
                'email_verified_at' => now(), // Auto-verify email since they paid
            ]
        );

        // Generate student ID
        $studentId = $user->generateStudentId();
        
        // Update order with user relationship if not set
        if (!$this->user_id) {
            $this->update(['user_id' => $user->id]);
        }

        // Send credentials email
        try {
            Mail::to($user->email)->send(new StudentCredentials($user, $password, $studentId));
        } catch (\Exception $e) {
            \Log::error('Failed to send student credentials email: ' . $e->getMessage());
        }
    }

    /**
     * Generate a random password for students
     */
    private function generateRandomPassword(): string
    {
        $characters = 'ABCDEFGHJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789';
        $password = '';
        for ($i = 0; $i < 8; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $password;
    }
}
