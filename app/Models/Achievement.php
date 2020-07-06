<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'user_id', 'ach_title', 'ach_date', 'ach_detail'
    ];
}
