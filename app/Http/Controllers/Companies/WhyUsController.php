<?php

namespace App\Http\Controllers\Companies;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WhyUsController extends Controller
{
    public function index()
    {
        return view('companies.whyUs');
    }

}
