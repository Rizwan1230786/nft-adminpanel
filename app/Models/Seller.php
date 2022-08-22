<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Seller extends Authenticatable
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'seller_id',
        'secret_key',
        'fullname',
        'displayname',
        'email',
        'image',
        'account_type',
        'phoneno',
        'dob',
        'plan',
        'theme',
        'google_id',
        'apple_id',
        'verification_code',
        'verification_time',
        'is_verified',
        'password',
        'stripe_link',
        'stripe_account_id',
        'stripe_status',
    ];
    protected $hidden = [
        'password',
    ];
}
