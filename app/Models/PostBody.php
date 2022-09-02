<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostBody extends Model
{
      use HasFactory;
      protected $fillable = [
       'category',
        'title',     
        'body',
        'introduction',
        'mission',
        'vission',
        'objectives',
        'address',
        'phone',
        'email',
        'website',
        'user_id'
       ];
}
