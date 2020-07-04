<?php

namespace App\Http\Controllers\Admin;

use DB;

use PDF;
use App\Cv;
use App\User;
use App\Admin;
use App\Experience;
use App\Education;
use App\Achievement;
use App\Language;
use App\Company;
use App\JobPost;
use App\Apply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CandidateManagermentController extends Controller
{
    public function index()
    {
        $user = DB::table('users')
            ->get();

        $count_cv = Cv::count();
        $count_applies = Apply::count();

        $count_cv_30 = Cv::where( 'created_at', '>', Carbon::now()->subDays(30))
            ->count();
        $count_cv_7 = Cv::where( 'created_at', '>', Carbon::now()->subDays(7))
            ->count();
        $count_cv_today = Cv::where( 'created_at', '>', Carbon::now()->today())
            ->count();

        $count_applies_30 = Apply::where( 'created_at', '>', Carbon::now()->subDays(30))
            ->count();
        $count_applies_7 = Apply::where( 'created_at', '>', Carbon::now()->subDays(7))
            ->count();
        $count_applies_today = Apply::where( 'created_at', '>', Carbon::now()->today())
            ->count();

    
        return view('admin.candidateManagerment', compact('user','count_cv','count_applies'));
    }
    public function show($id)
    {   
        $users = User::where('id', $id)
            ->get();

        $companies = DB::table('companies')
            ->where('id', '=', $id)
            ->get();      

        $candidate_had_applied = DB::table('applies')
            ->where('user_id', '=', $id)
            ->where('confirmed', '=', '1')
            ->join('job_posts', 'applies.job_post_id', '=', 'job_posts.id')
            ->select(
                'job_posts.job_title as job_title',
                'applies.created_at as created_at')
            ->get();

        return view('admin.candidateDetails', compact('users','candidate_had_applied','companies'));

    }

    public function pdf(Request $request, $id) 
    {
        set_time_limit(60000);
        $display_cv = Cv::find($id);

        $users = User::find($id)
            ->where('id', '=', $id)
            ->get();

        $display_education = Education::find($id)
            ->where('user_id', '=', $id)
            ->get();
        $display_experience = Experience::find($id)
            ->where('user_id', '=', $id)
            ->get();
        $display_achievement = Achievement::find($id)
            ->where('user_id', '=', $id)
            ->get();
        $display_language = Language::find($id)
            ->where('user_id', '=', $id)
            ->get();

        $pdf = PDF::loadView('admin.pdf', compact('display_cv', 'display_experience','users',
                            'display_education', 'display_achievement', 'display_language'));
        
        return $pdf->download('cv.pdf');
    }

}
