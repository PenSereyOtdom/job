<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'user_id','school_name', 'major', 'edu_start_date', 'edu_end_date','edu_detail'
    ];
}
