<?php

namespace App\Http\Controllers\Admin;


use DB;
use App\Models\Cv;
use App\Models\User;
use App\Models\Company;
use App\Models\JobPost;
use App\Models\Apply;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $count_cv = Cv::count();
        $count_company = Company::count();
        $count_jobpost = JobPost::count();
        $count_applies = Apply::where('confirmed','=', 1)
            ->count();

        $count_cv_30 = Cv::where( 'created_at', '>', Carbon::now()->subDays(30))
            ->count();
        $count_cv_7 = Cv::where( 'created_at', '>', Carbon::now()->subDays(7))
            ->count();
        $count_cv_today = Cv::where( 'created_at', '>', Carbon::now()->today())
            ->count();

        $count_company_30 = Company::where( 'created_at', '>', Carbon::now()->subDays(30))
            ->count();
        $count_company_7 = Company::where( 'created_at', '>', Carbon::now()->subDays(7))
            ->count();
        $count_company_today = Company::where( 'created_at', '>', Carbon::now()->today())
            ->count();

        $count_jobpost_30 = JobPost::where( 'created_at', '>', Carbon::now()->subDays(30))
            ->count();
        $count_jobpost_7 = JobPost::where( 'created_at', '>', Carbon::now()->subDays(7))
            ->count();        
        $count_jobpost_today = JobPost::where( 'created_at', '>', Carbon::now()->today())
            ->count();

        $count_applies_30 = Apply::where('confirmed','=', 1)
            ->where( 'created_at', '>', Carbon::now()->subDays(30))
            ->count();
        $count_applies_7 = Apply::where('confirmed','=', 1)
            ->where( 'created_at', '>', Carbon::now()->subDays(7))
            ->count();
        $count_applies_today = Apply::where('confirmed','=', 1)
            ->where( 'created_at', '>', Carbon::now()->today())
            ->count();


        // $users = User::where( 'created_at', '>', Carbon::now()->subDays(60))
        //    ->count();
        // $users = User::where( 'created_at', '>', Carbon::now()->subDays(7))
        //    ->get();
        // $users = User::where( 'created_at', '>', Carbon::now()->today())
        //    ->get();

        // dd($count_cv_30);


        return view('admin.home', compact('count_cv', 'count_company','count_jobpost','count_applies'));

    }

}
