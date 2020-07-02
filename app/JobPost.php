<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    public $fillable = [
        'company_id','service_id', 'job_title', 'job_classification',
        'job_industry', 'job_type', 'location', 'salary', 
        'number_of_hiring','qualification','experience_level', 'language',
        'description', 'requirement', 'phone_number', 'email', 'closing_date', 
        'job_priority','condition','status', 'save',
    ];
}
