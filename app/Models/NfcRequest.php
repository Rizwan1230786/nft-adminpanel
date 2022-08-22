<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NfcRequest extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'contact',
        'detail',
        'shop_name',
        'address'
    ];
}
