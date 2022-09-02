<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class page extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_title',
        'meta_descriptions',
        'meta_keywords',
        'section_no',
        'attachment',
        'user_id'
    ];
}
