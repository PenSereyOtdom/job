<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobClassification extends Model
{
    protected $fillable = [
        'admin_id','job_classification',
    ];
}
