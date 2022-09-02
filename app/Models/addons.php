<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addons extends Model
{
    use HasFactory;
      protected $fillable = [
        'addon_name',
        'days',
        'price',
         'srsprice',
        'currency',
        'category',
        'type',
        'style',
        'overview',
        'addon_highlight',
        'physical_rating',
        'seo',
        'user_id'
    ];
}
