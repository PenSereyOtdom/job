<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'user_id', 'exp_workplace_name','exp_title','exp_start_date','exp_end_date','exp_detail'
    ];
}
