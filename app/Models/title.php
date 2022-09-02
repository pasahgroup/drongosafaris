<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class title extends Model
{
    use HasFactory;
     use HasFactory;
      use HasFactory;
     protected $fillable = [        
        'title',     
        'body',  
        'attachment',            
        'user_id'
       ];
}
