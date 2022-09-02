<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogBody extends Model
{
    use HasFactory;
      protected $fillable = [
        'title',
        'blog_category',
        'blog_body',
        'user_id'
       ];
}
