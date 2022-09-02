<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attraction extends Model
{
    use HasFactory;
      protected $fillable = [
        'attraction_title',
        'attraction_description', 
        'tour_circuit', 
        'type', 
        'attachment',
        'user_id'
    ];
}
