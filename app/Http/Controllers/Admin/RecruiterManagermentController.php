<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Company;
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
        
        return view('admin.recruiterManagerment', compact('companies', 'jobpost', 'cj'));
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
