<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    use HasFactory;
    protected $fillable=[
        'page_title',
        'url_slug',
        'meta_title',
        'head_title',
        'page_priority',
        'meta_keyword',
        'meta_desc',
        'page_content',
        'page_rank',
        'short_desc',
        'image'
    ];
}
