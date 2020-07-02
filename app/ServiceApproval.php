<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceApproval extends Model
{
    protected $fillable = [
        'admin_id','company_id','payment_id','service_id','approve','transaction_aba','transaction_wing','post_number','value_data'
    ];
}
