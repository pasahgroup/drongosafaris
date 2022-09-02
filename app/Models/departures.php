<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departures extends Model
{
        use HasFactory;
        protected $fillable = [
        'tour_id',
        'group_tour_category',
        'price',
        'srs',
        'seats',
        'booked',
        'start_date',        
        'end_date',
        'status',
        'user_id'
       ];
}
