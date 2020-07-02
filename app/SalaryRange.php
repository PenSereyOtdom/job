<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryRange extends Model
{
    protected $fillable = [
        'admin_id','salary_range',
    ];
}
