<?php

namespace App\Http\Controllers\Users;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    public function contactUs()
    {
        return view('users.contactUs');
    }
}
