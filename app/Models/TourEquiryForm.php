<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourEquiryForm extends Model
{
    use HasFactory;
      protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'country',
        'phone',
        'tour_id',
        'depart_id',
        'tour_type',
        'accommodation',
        'adults',

         'teens',
        'children',
         'tour_date',
        'travel_date',

          'pin',
          'status',
        'additional_information',
       'hear_about_us'
    ];
}
