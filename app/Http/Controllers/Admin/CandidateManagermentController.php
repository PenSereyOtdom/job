<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\User;
use App\Company;
use App\JobPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CandidateManagermentController extends Controller
{
    public function index()
    {
        $user = DB::table('users')
            ->get();
        return view('admin.candidateManagerment', compact('user'));
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
                'applies.created_at as created_at'            )
            ->get();

        return view('admin.candidateDetails', compact('users','candidate_had_applied','companies'));

    }

}
