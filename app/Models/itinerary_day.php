<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itinerary_day extends Model
{
    use HasFactory;
    protected $fillable = [
        'day',
        'itinerary_id',
        'itinerary_title',
        'distance',
        'transport',
        'meal',
        'itinerary_description',
        'destination_id',
        'accommodation_id'
    ];
}
