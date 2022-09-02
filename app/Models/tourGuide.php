<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tourGuide extends Model
{
    use HasFactory;
      protected $fillable = [
        'first_name',
        'last_name', 
        'phone',
        'email',
        'birth',       
        'nationality',
        'language', 
        'other_language',          
        'photo',
        'cv',
        'pin',
        'status',
        'driving_license',
        'education_level',
        'professional',
        'work_experience',       
        'hear_about_us'
    ];
}
