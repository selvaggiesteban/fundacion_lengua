<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accomodation extends Model
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
        'tax_id',
        'address',
        'postal_code',
        'city',
        'province',
        'country',
        'phone_1',
        'fax',
        'website',
        'phone_2',
        'contact1_name',
        'contact1_position',
        'contact1_email',
        'contact2_name',
        'contact2_position',
        'contact2_email',
        'extra_info_1',
        'extra_info_2',
        'other_data',
        'observations',
    ];

    /**
     * Get the display text for the accomodation's section.
     *
     * @return string
     */
    public function getSectionTextAttribute()
    {
        switch ($this->section) {
            case 'family_stay':
                return 'Alojamiento en familia';
            case 'university_residence':
                return 'Residencia Universitaria';
            case 'hotel':
                return 'Hotel';
            case 'apartment':
                return 'Apartamento';
            default:
                return $this->section ? ucfirst(str_replace('_', ' ', $this->section)) : 'No especificado';
        }
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'accomodation_tag', 'accomodation_id', 'tag_id');
    }
    
    public function students()
    {
        return $this->belongsToMany(Student::class, 'accomodation_student', 'accomodation_id', 'student_id');
    }
}