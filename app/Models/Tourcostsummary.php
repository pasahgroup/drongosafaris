<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tourcostsummary extends Model
{
    use HasFactory;
     protected $fillable = [
        
         'program',
        'season',
        'status',
        'twopax',
        'threepax',
        'fourpax',
        'fivepax',
        'sixpax',
        'srs',                
        'currency',
        'user_id'
    ];
}
