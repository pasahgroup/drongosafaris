<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itinerary extends Model
{
    use HasFactory;
    protected $fillable = [
        'itinerary_summury',
        'days',
        'program_id',
        'tour_addon',
        'user_id'
    ];
}
