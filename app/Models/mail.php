<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class mail extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable=[
    'driver'    ,
    'host'      ,
    'port'      ,
    'from'       ,
    'encryption' ,
    'username'   ,
    'password'   ,
    'sendmail'  ,
    'pretend'   
    ];
}
