<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use Notifiable;

        protected $guard = 'company';

        protected $fillable = [
            'name', 'email', 'password', 'phone_number', 'isVerified',
            'company_profile', 'address', 'city',
            'website','recruiter_name','recruiter_position',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
}
