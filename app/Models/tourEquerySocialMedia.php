<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tourEquerySocialMedia extends Model
{
    use HasFactory;
        protected $fillable = [
        'tour_equery_id',
        'social_name',
         'from_name'

    ];
}
