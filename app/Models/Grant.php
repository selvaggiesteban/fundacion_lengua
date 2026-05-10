<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    use HasFactory;
    
    protected $table = 'grants';
    
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
     * Get the display text for the grant's section.
     *
     * @return string
     */
    public function getSectionTextAttribute()
    {
        switch ($this->section) {
            case 'teachers':
                return 'Profesores';
            case 'granted':
                return 'Concedida';
            default:
            return $this->section ? ucfirst(str_replace('_', ' ', $this->section)) : 'No especificado';
        }
    }
}