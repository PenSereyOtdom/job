<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerAdvisePageController extends Controller
{
    public function careerAdvisePage()
    {
        return view('user.careerAdvisePage');
    }
}
