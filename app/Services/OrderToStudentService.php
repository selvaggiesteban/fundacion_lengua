<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class OrderToStudentService
{
    /**
     * Convert a paid order to a student record
     */
    public function convert(Order $order)
    {
        DB::beginTransaction();

        try {
            Log::info('Starting order to student conversion for order: ' . $order->id);

            // Verify order is paid
            if ($order->payment_status !== Order::PAYMENT_STATUS_COMPLETED) {
                throw new \Exception('Order must be paid before conversion to student');
            }

            // Check if order is already converted
            if ($order->user_id) {
                Log::info('Order already has associated user: ' . $order->user_id);
                return $order->user;
            }

            // Create user account
            $user = $this->createUserFromOrder($order);
            
            // Create student record
            $student = $this->createStudentFromOrder($order, $user);

            // Associate order with user
            $order->update(['user_id' => $user->id]);

            DB::commit();

            Log::info('Successfully converted order to student', [
                'order_id' => $order->id,
                'user_id' => $user->id,
                'student_id' => $student->id
            ]);

            return $user;

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to convert order to student: ' . $e->getMessage(), [
                'order_id' => $order->id
            ]);
            throw $e;
        }
    }

    /**
     * Create user account from order data
     */
    private function createUserFromOrder(Order $order)
    {
        // Check if user with this email already exists
        $existingUser = User::where('email', $order->email)->first();
        
        if ($existingUser) {
            // If user exists, update role to student if needed
            if ($existingUser->role !== 'student') {
                $existingUser->update(['role' => 'student']);
            }
            return $existingUser;
        }

        // Generate temporary password
        $temporaryPassword = Str::random(12);

        $user = User::create([
            'name' => $order->full_name,
            'email' => $order->email,
            'password' => Hash::make($temporaryPassword),
            'role' => 'student',
        ]);

        // Log temporary password for admin reference
        Log::info('Created new user with temporary password', [
            'user_id' => $user->id,
            'email' => $user->email,
            'temporary_password' => $temporaryPassword
        ]);

        return $user;
    }

    /**
     * Create student record from order data
     */
    private function createStudentFromOrder(Order $order, User $user)
    {
        // Check if student record already exists for this user
        $existingStudent = Student::where('email', $order->email)->first();
        
        if ($existingStudent) {
            Log::info('Student record already exists for email: ' . $order->email);
            return $existingStudent;
        }

        $studentData = [
            'name' => $order->full_name,
            'email' => $order->email,
            'passport' => $order->passport_number,
            'postal_code' => $order->postal_code,
            'language' => $order->language,
            'center' => $order->study_center_name,
            'level' => $order->spanish_level,
            'address' => $order->address,
            'city' => $order->city,
            'second_language' => $order->second_language,
            'birthdate' => $order->birth_date,
            'phone' => $order->phone_number,
            'country' => $order->country,
            'province' => $order->province,
            'sex' => $this->mapGender($order->gender),
            'status' => 'active',
            'payment_status' => '499', // Payment with card
            'start_date' => $order->start_date,
            'end_date' => $this->calculateEndDate($order->start_date, $order->weeks),
        ];

        // Remove null values
        $studentData = array_filter($studentData, function($value) {
            return $value !== null;
        });

        $student = Student::create($studentData);

        Log::info('Created student record', [
            'student_id' => $student->id,
            'user_id' => $user->id,
            'order_id' => $order->id
        ]);

        return $student;
    }

    /**
     * Map gender from order to student format
     */
    private function mapGender($gender)
    {
        if (!$gender) {
            return null;
        }

        $gender = strtolower($gender);
        
        if (in_array($gender, ['masculino', 'male', 'hombre', 'm'])) {
            return 'Masculino';
        }
        
        if (in_array($gender, ['femenino', 'female', 'mujer', 'f'])) {
            return 'Femenino';
        }

        return $gender;
    }

    /**
     * Calculate end date based on start date and weeks
     */
    private function calculateEndDate($startDate, $weeks)
    {
        if (!$startDate || !$weeks) {
            return null;
        }

        return \Carbon\Carbon::parse($startDate)->addWeeks($weeks);
    }

    /**
     * Get order conversion status
     */
    public function getConversionStatus(Order $order)
    {
        return [
            'is_converted' => (bool) $order->user_id,
            'user_exists' => $order->user_id ? User::find($order->user_id) : null,
            'student_exists' => Student::where('email', $order->email)->exists(),
            'can_convert' => $order->payment_status === Order::PAYMENT_STATUS_COMPLETED && !$order->user_id,
        ];
    }
}