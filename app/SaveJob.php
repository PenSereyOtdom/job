<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaveJob extends Model
{
    protected $fillable = [
        'user_id', 'job_post_id', 'saved',
    ];
}
