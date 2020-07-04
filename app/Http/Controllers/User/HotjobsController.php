<?php

namespace App\Http\Controllers\User;

use DB;
use App\JobPost;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotJobsController extends Controller
{
    public function hotJobs(Request $request)
    {
        $jobs = DB::table('job_posts')
            ->where('status', '=', 'active')
            ->where('job_priority', '=', 'Urgent')
            ->join('companies', 'job_posts.company_id', '=', 'companies.id')
            ->select('companies.name as name',
                    'companies.company_profile as profile',
                    'job_posts.*'
                    )
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $count_jobs = count($jobs);
        
        return view('user.hotJobs', compact('jobs','count_jobs'));
    }
}
