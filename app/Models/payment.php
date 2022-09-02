<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
     protected $fillable = [
        'customer_id',
        'tour_id',
        'amount_paid',
        'payee_date'
          ];
}
