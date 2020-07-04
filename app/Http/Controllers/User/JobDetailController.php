<?php

namespace App\Http\Controllers\User;

use DB;
use App\Apply;
use App\SaveJob;
use App\JobPost;
use App\Company;
use App\Admin;
use App\User;
use App\Achievement;
use App\Education;
use App\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserAppliedJob;
use App\Http\Controllers\Controller;

class JobDetailController extends Controller
{
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $apply = Apply::where('user_id', '=', $user_id)
            ->where('job_post_id', '=', $request->get('id'))
            ->first();


        if (is_null($apply)) {
            $apply = new Apply([
                'user_id' => Auth::user()->id,
                'job_post_id' => $request->get('id'),
                'confirmed' => $request->get('confirmed')
            ]);
        } else {
            $apply->confirmed = $request->get('confirmed');
        }

        $job_post_id = $apply->job_post_id;
        $job_post = JobPost::find($job_post_id);


        if($request->get('confirmed')==1) {
            //notify company that user has applied & notify admin

            $company_id = $job_post->company_id;
            $company = Company::find($company_id);
            $company->notify(new UserAppliedJob);
            $user = User::find($user_id);
            Admin::find(1)->notify(new UserAppliedJob($company, $user));

        }

        $apply->save();

        return redirect()->back();
    }

    public function save(Request $request)
    {
        $user_id = Auth::id();
        $save = SaveJob::where('user_id', '=', $user_id)
            ->where('job_post_id', '=', $request->get('id'))
            ->first();  


        if (is_null($save)) {
            $save = new SaveJob([
                'user_id' => Auth::user()->id,
                'job_post_id' => $request->get('id'),
                'saved' => 1
            ]);
            $save->save();
        } else {
            $save->delete();
        }


        return redirect()->back();
    }

    
    
    public function show($id)
    {
    
        $user_id = Auth::id();
        $jobDetail = DB::table('job_posts')
            ->join('companies', 'job_posts.company_id', '=', 'companies.id')
            ->select(
                'companies.name as company_name',
                'companies.company_profile as profile',
                'companies.recruiter_name as recruiter_name',
                'companies.address as address',
                'job_posts.*'
                )
            ->where('job_posts.id','=', $id)
            ->get();
            
        $classification = DB::table('job_posts')
            ->where('job_posts.id','=', $id)
            ->select('job_classification')
            ->first();

        $relatedJobs = DB::table('job_posts')  
            ->where('job_classification','=', $classification ->job_classification )
            ->where('status', '=','active')
            ->join('companies', 'job_posts.company_id', '=', 'companies.id')
            ->select(                
                'companies.name as company_name',
                'job_posts.*'
                )
            ->paginate(5);

        $company_id = DB::table('job_posts')
            ->where('job_posts.id','=', $id)
            ->select('company_id')
            ->first();

        $jobFromCompany = DB::table('job_posts')  
            ->where('company_id','=', $company_id ->company_id )
            ->where('status', '=','active')
            ->join('companies', 'job_posts.company_id', '=', 'companies.id')
            ->select(                
                'companies.name as company_name',
                'job_posts.*'
                )
            ->paginate(4);        

        $apply = Apply::where('user_id', '=', $user_id)
            ->where('job_post_id', '=', $id)
            ->first();
            
        if (is_null($apply)) {
            $apply = new Apply;
            $apply->confirmed = 0;
        }

        $save = SaveJob::where('user_id', '=', $user_id)
            ->where('job_post_id', '=', $id)
            ->first();
        if (is_null($save)) {
            $save = new SaveJob;
            $save->saved = 0;
        }
        $displays = Apply::where('user_id', $user_id)
            ->where('confirmed', '=', '1')
            ->get();
        $count_accept = count($displays);

        //check cv condition
        $cv = DB::table('cvs')
            ->where('user_id', '=', $user_id)
            ->get();
        $count_cv = count($cv);

        return view('user.jobDetail', compact('jobDetail', 'apply', 'save', 'count_accept', 'count_cv','relatedJobs', 'jobFromCompany'));

    }
}
