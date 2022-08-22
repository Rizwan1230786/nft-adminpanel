<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinksProduct extends Model
{
    use HasFactory;
    protected $fillable=[
        'link_id',
        'product_id'
    ];
}
