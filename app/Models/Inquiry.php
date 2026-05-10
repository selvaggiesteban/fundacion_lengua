<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'section',
        'name',
        'email',
        'phone',
        'country',
        'center',
        'subject',
        'message',
    ];

    /**
     * Get the display text for the inquiry's section.
     *
     * @return string
     */
    public function getSectionTextAttribute()
    {
        switch ($this->section) {
            case 'teacher_teaching_inquiry':
                return 'Profesores (Quiero ser profesor)';
            case 'teacher_improvement_inquiry':
                return 'Profesores (Quiero mejorar)';
            case 'student_inquiry':
                return 'Alumnos';
            default:
                return $this->section ? ucfirst(str_replace('_', ' ', $this->section)) : 'No especificado';
        }
    }
}