<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class destination extends Model
{
    use HasFactory;
    protected $fillable = [
        'destination_name',
        'category',
        'popularity',
        'destination_description',
        'seo',
         'photo',
        'location_id',
        'user_id'
    ];
}
