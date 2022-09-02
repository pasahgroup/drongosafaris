<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buyaddons extends Model
{
    use HasFactory;
      protected $fillable = [        
         'program_id',
         'addon_name'
    ];
}
