<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Income extends Model
{
    use HasFactory;
    protected $fillable=[
        'month',
        'no_card_sell',
        'revenue',
        'expences',
        'profit',
        'loss'
    ];
    public function index(){
        $user=Income::all();
        return $user;
    }
}
