<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceOtp extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'macaddress',
        'otp',
        'code_expiry'
    ];
}
