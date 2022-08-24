<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generalsetting extends Model
{
    use HasFactory;
    protected $fillable=['header_logo','footer_detail','favicon_image','website_logo','header_bg_img','footer_bg_img','application_title','address','email_address','contact'];
}
