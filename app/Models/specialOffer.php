<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialOffer extends Model
{
    use HasFactory;
    protected $fillable = [
        'tour_id',
        'discount',
        'new_price',
        'save',
        'sales_header',
        'offer_deadline',
        'status'
    ];
}
