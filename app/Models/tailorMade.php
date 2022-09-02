<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tailorMade extends Model
{
    use HasFactory;
     protected $fillable = [
        'first_name',
        'last_name',
        'nationality',
         'email',
          'phone',
        'arrival_date',     
      
        'adults',
        'teens',
        'children',
         'days',
        'tour_type',
        'physical_rating',
        'destination',        
        'accommodation',
        
        'min_budget',
        'max_budget',
        'calculated_cost',
        'total_amount_paid',
        'amount_remain',        
        'currency',
        'end_date',
        'pin',
        'status',
        'payee_status',
        'attachment',
        'other_information',
        'hear_about_us'
    ];
}
