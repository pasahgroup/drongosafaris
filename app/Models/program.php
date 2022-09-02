<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class program extends Model
{
    use HasFactory;
    protected $fillable = [
        'tour_name',
        'days',
        'cost',
        'price',
        'currency',
        'category',
        'type',
        'style',
        'tour_code',
        'tour_circuit',
        'overview',
        'tour_highlight',
        'physical_rating',
        'popular_experience',
        'seo',
        'user_id'
    ];
}
