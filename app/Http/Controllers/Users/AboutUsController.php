<?php

namespace App\Http\Controllers\Users;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function aboutUs()
    {
        return view('user.aboutUs');
    }
}
