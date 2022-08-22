<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Order extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'amount',
        'email',
        'firstname',
        'lastname',
        'phoneno',
        'card_number',
        'expiry_date',
        'cvc',
        'zip_code',
        'customer_id'
    ];
}
