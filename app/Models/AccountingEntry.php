<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountingEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'entry_date',
        'description',
        'debit_amount',
        'credit_amount',
        'balance',
        'entry_type',
        'reference_number',
        'notes',
        'created_by',
    ];

    protected $casts = [
        'entry_date' => 'datetime',
        'debit_amount' => 'decimal:2',
        'credit_amount' => 'decimal:2',
        'balance' => 'decimal:2',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function getAmountAttribute()
    {
        return $this->debit_amount ?? $this->credit_amount ?? 0;
    }

    public function isCredit()
    {
        return !is_null($this->credit_amount);
    }

    public function isDebit()
    {
        return !is_null($this->debit_amount);
    }
}
