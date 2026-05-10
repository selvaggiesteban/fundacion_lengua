<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
    ];
    
    public function accomodations()
    {
        return $this->belongsToMany(Accomodation::class, 'accomodation_tag', 'tag_id', 'accomodation_id');
    }

    public function scholarships()
    {
        return $this->belongsToMany(Scholarship::class, 'scholarship_tag', 'tag_id', 'scholarship_id');
    }

    public function rates()
    {
        return $this->belongsToMany(Rate::class, 'rate_tag', 'tag_id', 'rate_id');
    }

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class, 'conversation_tag', 'tag_id', 'conversation_id');
    }
}