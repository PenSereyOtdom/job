<?php

namespace App\Http\Controllers\Users;


use DB;
use App\Models\JobPost;
use App\Models\User;
use App\Models\SalaryRange;
use App\Models\JobType;
use App\Models\Master;
use App\Models\Qualification;
use App\Models\JobClassification;
use App\Models\ExperienceLevel;
use App\Models\BusinessIndustry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class SearchFilterController extends Controller
{
    public function create(Request $request)
    {

        // dd($request->all());

        $job_classifications = DB::table('job_classifications')
        ->get();

        $job_types = DB::table('job_types')
        ->get();

        $salary_ranges = DB::table('salary_ranges')
        ->get();

        $business_industries = DB::table('business_industries')
        ->get();
        $experience_levels = DB::table('experience_levels')
        ->get();
        
        // dd($display_jobClassification);
        
        return view('layouts.searchfilter', compact('job_classifications','job_types','salary_ranges','display_salary',
                                                        'business_industries','experience_levels'));
        
        // return view('layouts.searchfilter', compact('display_jobClassification'));
    }
}
