<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'type_of_payment','address', 'map','acc_name','acc_number','contact1','contact1','gmail', 'qr_aba', 'qr_wing',
    ];
}
