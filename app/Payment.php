<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'service_id','type_of_payment','address', 'map','acc_name','acc_number','contact','transaction',
    ];
}
