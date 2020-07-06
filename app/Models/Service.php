<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'admin_id','title','price', 'number_of_post','valid_days',
    ];
}
