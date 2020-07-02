<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'admin_id','companies_id','title','price', 'number_of_post','valid_days',
    ];
}
