<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Barber extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'facebook_link',
        'instagram_link',
        'tiktok_link',
        'twitter_link',
        'seller_id',
        'is_deleted',
    ];
}
