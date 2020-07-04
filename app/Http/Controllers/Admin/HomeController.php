<?php

namespace App\Http\Controllers\Admin;

use App\Cv;
use App\Company;
use App\JobPost;
use App\Apply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $count_cv = Cv::count();
        $count_company = Company::count();
        $count_jobpost = JobPost::count();
        $count_applies = Apply::count();

        return view('admin.home', compact('count_cv', 'count_company','count_jobpost','count_applies'));

    }

}
