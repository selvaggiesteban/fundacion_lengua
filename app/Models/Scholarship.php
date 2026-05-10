<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    protected $table = 'scholarships';
    protected $fillable = [
        'title',
        'section',
        'summary',
        'image_path',
        'application_start_date',
        'application_end_date',
        'contact_name',
        'contact_phone',
        'contact_email',
        'discount_code', // Añadido el campo discount_code
        'foundation_notes',
        'discount_details',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'application_start_date' => 'date',
        'application_end_date' => 'date',
        'discount_details' => 'array',
    ];

    /**
     * Get the display text for the scholarship's section.
     *
     * @return string
     */
    public function getSectionTextAttribute()
    {
        switch ($this->section) {
            case 'centers':
                return 'Centros';
            case 'firenza':
                return 'Firenza';
            case 'private':
                return 'Particulares';
            case 'general':
                return 'Generales';
            default:
                return $this->section ? ucfirst(str_replace('_', ' ', $this->section)) : 'No especificado';
        }
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'scholarship_tag', 'scholarship_id', 'tag_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'scholarship_student', 'scholarship_id', 'student_id')
                    ->withPivot(['application_date', 'status', 'awarded_date', 'notes', 'id'])
                    ->withTimestamps();
    }
}