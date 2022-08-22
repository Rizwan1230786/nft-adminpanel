<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinksService extends Model
{
    use HasFactory;
    protected $fillable=[
        'link_id',
        'service_id'
    ];
    public function getLinkServices()
    {
        return $this->hasMany(Services::class, 'id', 'service_id');
    }
}
