<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    
    protected $table = 'rates';
    
    protected $fillable = [
        'title',
        'section',
        'summary',
        'start_date',
        'end_date',
        'weekly_rates_details',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'weekly_rates_details' => 'array',
    ];

    /**
     * Get the display text for the rate's section.
     *
     * @return string
     */
    public function getSectionTextAttribute()
    {
        
        switch ($this->section) {
            case 'course_type':
                return 'Tipo de curso';
            case 'accommodation_fee':
                return 'Alojamiento';
            case 'options':
                return 'Opcionales';
            case 'registration':
                return 'Inscripción';
            case 'discount_definition':
                return 'Descuento';
            case 'date_period':
                return 'Fechas';
            default:
                return $this->section ? ucfirst(str_replace('_', ' ', $this->section)) : 'No especificado';
        }
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'rate_tag', 'rate_id', 'tag_id');
    }
}