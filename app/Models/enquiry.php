<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enquiry extends Model
{
    use HasFactory;
      protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'country',
      
        'tour_id',
      'accomodation',
        
         'adults',
         'teens',
        'children',
         'days',
        'arrival_date',
        'travel_date',
        'end_date',
        'status',
        'pin',
        'enquiry',
        'hear_about_us'
    ];
}
