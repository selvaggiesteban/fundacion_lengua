<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // Declaración añadida

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'passport',
        'postal_code',
        'language',
        'center',
        'level',
        'address',
        'city',
        'second_language',
        'birthdate',
        'partner',
        'phone',
        'country',
        'province',
        'sex',
        'status',
        'payment_status',
        'start_date',
        'end_date',
        'user_level',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birthdate' => 'datetime',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function getPaymentStatusTextAttribute()
    {
        switch ($this->payment_status) {
            case '501':
                return 'Pago por transferencia';
            case '503':
                return 'Pago en efectivo';
            case '500':
                return 'Curso finalizado';
            case '499':
                return 'Pago con tarjeta';
            case '485':
                return 'Revisión';
            case '505':
                return 'Pendiente';
            case '507':
                return 'Renuncia / Aplazamiento';
            default:
                return $this->payment_status ? $this->payment_status : 'N/A';
        }
    }

    public function accomodations()
    {
        return $this->belongsToMany(Accomodation::class, 'accomodation_student', 'student_id', 'accomodation_id');
    }
    
    public function scholarships()
    {
        return $this->belongsToMany(Scholarship::class, 'scholarship_student', 'student_id', 'scholarship_id')
                    ->withPivot(['application_date', 'status', 'awarded_date', 'notes', 'id'])
                    ->withTimestamps();
    }

    /**
     * Los tests que ha realizado el estudiante (los intentos).
     */
    public function attempts(): BelongsToMany
    {
        return $this->belongsToMany(Test::class, 'student_test')
                    ->withPivot('score', 'submitted_at')
                    ->withTimestamps();
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_course', 'student_id', 'course_id');
    }

    public function accountingEntries()
    {
        return $this->hasMany(\App\Models\AccountingEntry::class)->orderBy('entry_date', 'desc');
    }

    public function getCurrentBalanceAttribute()
    {
        return $this->accountingEntries()->latest()->first()?->balance ?? 0;
    }

    public function getTotalCreditsAttribute()
    {
        return $this->accountingEntries()->sum('credit_amount');
    }

    public function getTotalDebitsAttribute()
    {
        return $this->accountingEntries()->sum('debit_amount');
    }
}