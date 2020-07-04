<?php

namespace App\Http\Controllers\Companies;

use DB;
use App\JobPost;
use App\User;
use App\SalaryRange;
use App\JobType;
use App\Master;
use App\Qualification;
use App\JobClassification;
use App\ExperienceLevel;
use App\BusinessIndustry;
use App\ServiceApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use \Datetime;

class JobPostController extends Controller
{
    public function index()
    {

        $company_id = Auth::guard('company')->user()->id;
        $jobPost = DB::table('job_posts')
            ->where('company_id', '=', $company_id)
            ->join('companies', 'job_posts.company_id', '=', 'companies.id')
            ->select('companies.name as name',
                    'companies.company_profile as profile',
                    'job_posts.*'
                    )
            ->paginate(10);
        
        return view('companies.jobPost', compact('jobPost'));
    }

    public function create(Request $request, $service_id)
    {

        $service_type = DB::table('services')
        ->where('id','=',$service_id)
        ->first();
        $today = date("Y-m-d");
        
        $max_date = date('Y-m-d', strtotime($today .  "+ ".intval($service_type->valid_days)."days"));;
        $display_jobType = DB::table('job_types')
            ->get();

        $display_jobClassification = DB::table('job_classifications')
            ->get();
        
        $display_experienceLevel = DB::table('experience_levels')
            ->get();
        
        $display_salary = DB::table('salary_ranges')
            ->get();

        $display_businessIndustry = DB::table('business_industries')
            ->get();

        $display_qualification = DB::table('qualifications')
            ->get();
        
        return view('companies.createJobPost', compact('max_date','service_id','service_type','display_jobType','display_jobClassification','display_experienceLevel','display_salary',
                                                        'display_businessIndustry','display_qualification'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8'
        ]);
        

        
        $service_check = DB::table('service_approvals')
        ->where('company_id','=',Auth::guard('company')->user()->id)
        ->where('service_id','=',$request->get('service_id'))
        ->where('approve','=',1)
        ->decrement('post_number', 1);
        
        $service_check = DB::table('service_approvals')
        ->where('company_id','=',Auth::guard('company')->user()->id)
        ->where('service_id','=',$request->get('service_id'))
        ->where('approve','=',1)
        ->first();

        if(empty($service_check)) {
            return  $request->get('service_id');
        }

        $jobPost = new JobPost([
            'company_id' => Auth::guard('company')->user()->id,
            'job_title' => $request->get('job_title'),
            'job_classification' => $request->get('job_classification'),
            'job_industry' => $request->get('job_industry'),
            'job_type' => $request->get('job_type'),
            'location' => $request->get('location'),
            'salary' => $request->get('salary'),
            'number_of_hiring' => $request->get('number_of_hiring'),
            'qualification' => $request->get('qualification'),
            'experience_level' => $request->get('experience_level'),
            'language' => $request->get('language'),
            'description' => $request->get('description'),
            'requirement' => $request->get('requirement'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'closing_date' => $request->get('closing_date'),
            'job_priority' => $request->get('job_priority'),
            'condition' => $request->get('condition'),
            'status' => $request->get('status'),
            'save' => $request->get('save'),
            'service_id' => $request->get('service_id'),
        ]);

        $service_id = $request->get('service_id');

        $jobPost->save();
        return redirect('/company');
        
    }

    public function edit($id)
    {
        $edit_jobPost = JobPost::find($id);

        $edit_sr = DB::table('salary_ranges')
            ->get();

        $edit_jt = DB::table('job_types')
            ->get();

        $edit_qu = DB::table('qualifications')
            ->get();

        $edit_jc = DB::table('job_classifications')
            ->get();

        $edit_ex = DB::table('experience_levels')
            ->get();
        
        $edit_bi = DB::table('business_industries')
            ->get();
        
        return view('companies.editJobPost', compact('edit_jobPost','edit_sr','edit_jt','edit_qu','edit_jc','edit_ex', 'edit_bi'));
    }


    public function show($id)
    {
        $jobDetail = DB::table('job_posts')
            ->join('companies', 'job_posts.company_id', '=', 'companies.id')
            ->select(
                'companies.name as company_name',
                'companies.recruiter_name as recruiter_name',
                'companies.address as address',
                'job_posts.*'
                )
            ->where('job_posts.id','=', $id)
            ->get();     
        

        return view('companies.jobDetail', compact('jobDetail'));
    }

    public function update(Request $request, $id)
    {
        $jobPost = JobPost::find($id);

        $jobPost->job_title = $request->get('job_title');
        $jobPost->job_classification = $request->get('job_classification');
        $jobPost->job_industry = $request->get('job_industry');
        $jobPost->job_type = $request->get('job_type');
        $jobPost->location = $request->get('location');
        $jobPost->salary = $request->get('salary');
        $jobPost->number_of_hiring = $request->get('number_of_hiring');
        $jobPost->qualification = $request->get('qualification');
        $jobPost->experience_level = $request->get('experience_level');
        $jobPost->language = $request->get('language');
        $jobPost->description = $request->get('description');
        $jobPost->requirement = $request->get('requirement');
        $jobPost->email = $request->get('email');
        $jobPost->phone_number = $request->get('phone_number');
        $jobPost->closing_date = $request->get('closing_date');
        $jobPost->job_priority = $request->get('job_priority');
        $jobPost->condition = $request->get('condition');
        $jobPost->status = $request->get('status');
        $jobPost->save = $request->get('save');        

        $jobPost->update();

        return redirect('/jobPost')->with('edit_jobPost', $jobPost);
    }

    public function destroy($id)
    {
        $jobPost = JobPost::find($id);
        $company = Auth::guard('company')->user();

        $jobPost->delete();
        return redirect('/jobPost');
    }
}
    