<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerLinks extends Model
{
    use HasFactory;
    protected $fillable = [
        'seller_id',
        'link',
        'fullname',
        'displayname',
        'image',
        'is_deleted',
        'created_at',
        'updated_at',
    ];
}
