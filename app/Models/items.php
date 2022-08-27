<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    use HasFactory;
    protected $fillable=['user_id','image','name','detail','price','royality','size','no_of_copies','put_on_sale','sale_prize','unlock_purchased'];
}
