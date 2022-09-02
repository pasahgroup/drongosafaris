<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;
    protected $fillable = [
        'location_name',
        'country',
        'region',
        'district',
        'ward_town',
        'lat',
        'long',
        'user_id'
    ];
}
