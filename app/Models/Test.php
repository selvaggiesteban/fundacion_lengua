<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Test extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'is_active',
        'max_attempts',
    ];

    /**
     * Obtiene todas las preguntas para el test.
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Obtiene los estudiantes que han realizado este test.
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_test')
                    ->withPivot('score', 'submitted_at')
                    ->withTimestamps();
    }
}