<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    use HasFactory;
       protected $fillable = [
        'full_name',
        'subject',
        'comment',
        'phone',
        'email',
        'status'
       ];
}
