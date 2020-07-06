<?php

namespace App\Http\Controllers\Companies;

use DB;
use App\Models\JobPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $company_id = Auth::guard('company')->user()->id;
        $count_jobpost = JobPost::where('company_id', '=', $company_id)
            ->count();

        $count_active_job = JobPost::where('company_id', '=', $company_id)
            ->where('status', '=', 'Active')
            ->count();

        $count_draft_job = JobPost::where('company_id', '=', $company_id)
            ->where('status', '=', 'Draft')
            ->count();

        $count_applied_candidate = DB::table('applies')
            ->join('job_posts', 'applies.job_post_id', '=', 'job_posts.id')
            ->select(
                'applies.confirmed as confirmed',
                'job_posts.company_id as company_id'
            )
            ->where('company_id', '=', $company_id)
            ->where('confirmed', '=', '1')
            ->count();

        $services = DB::table('service_approvals')
            ->where('company_id', '=', $company_id)     
            ->join('services', 'service_approvals.service_id', '=', 'services.id')
            ->select(
                'services.title as title',
                'service_approvals.post_number as posts',
                'service_approvals.id as service_id',
                'services.id as id',
                'service_approvals.approve as approve', 
                'services.number_of_post as numbers')
            ->get();

        $count_jobposts = JobPost::where('status', '=', 'Active')
            ->where('company_id', '=', $company_id)
            ->count();

        if($count_jobpost>0){
            $count_average_candidate = round(($count_applied_candidate/$count_jobposts)*100);
        }
        else{
            $count_jobposts = 0;
            $count_applied_candidate = 0;
            $count_average_candidate = 0;
        }


        // dd($count_average_candidate);
        
        return view('companies.home', compact('count_jobpost', 'count_active_job','count_draft_job','count_applied_candidate','services', 'count_average_candidate'));

    }

}
