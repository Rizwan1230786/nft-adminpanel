<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Customer extends Authenticatable
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'phoneno',
        'dob',
        'is_verified',
        'is_deleted',
    ];
    protected $hidden = [
        'password',
    ];
    public function collection()
    {
        return $this->hasMany(Collection::class, 'customer_id', 'id');
    }

}
