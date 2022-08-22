<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoldClient extends Model
{
    use HasFactory;
    protected $fillable=[
        'client_name',
        'contact',
        'order_date',
        'no_of_orders',
        'orders_payment',
        'city',
        'image'
    ];
}
