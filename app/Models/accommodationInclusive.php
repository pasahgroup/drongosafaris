<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accommodationInclusive extends Model
{
    use HasFactory;
      protected $fillable = [
        'inclusive_id',        
        'tour_id',        
        'user_id'
    ];
}
