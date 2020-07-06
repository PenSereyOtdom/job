<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable = [
        'user_id', 'full_name','email', 'phone_number', 'summary',
    ];
}
