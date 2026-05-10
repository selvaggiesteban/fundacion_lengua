<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraduateImage extends Model
    {
        use HasFactory;

        protected $fillable = [
            'graduate_id',
            'image_path',
            'caption',
        ];
        
        public function graduate()
        {
            return $this->belongsTo(Graduate::class);
        }
    }
