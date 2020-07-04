<?php

namespace App\Http\Controllers\Admin;

use DB;
use Carbon\Carbon;
use App\Company;
use App\JobPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecruiterManagermentController extends Controller
{
    public function index()
    {        
        $companies = DB::table('companies')
            ->get();
        $jobpost = DB::table('job_posts')
            ->where('status', '=', 'Active')
            ->get();
        $cj = count($jobpost);

        $count_company = Company::count();
        $count_jobpost = JobPost::count();

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
        
        return view('admin.recruiterManagerment', compact('companies', 'jobpost', 'cj', 'count_company','count_jobpost'));
    }
    public function show($id)
    {
        $companies = DB::table('companies')
            ->where('id', '=', $id)
            ->get();

        $jobpost = DB::table('job_posts')
            ->where('id', '=', $id)
            ->get();
        return view('admin.recruiterDetails', compact('companies', 'jobpost'));
    }

}
