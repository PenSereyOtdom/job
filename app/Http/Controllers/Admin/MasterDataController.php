<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\SalaryRange;
use App\Models\JobType;
use App\Models\Master;
use App\Models\Qualification;
use App\Models\JobClassification;
use App\Models\ExperienceLevel;
use App\Models\BusinessIndustry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MasterDataController extends Controller
{
    public function index(Request $request)
    {
        $admin_id = Auth::guard('admin')->user()->id;
        
        $display_master = DB::table('masters')
            ->where('admin_id', '=', $admin_id)
            ->get();
        $count_master = count($display_master);

        $display_salary = DB::table('salary_ranges')
            ->where('admin_id', '=', $admin_id)
            ->get();

        $display_jobType = DB::table('job_types')
            ->where('admin_id', '=', $admin_id)
            ->get();

        $display_qualification = DB::table('qualifications')
            ->where('admin_id', '=', $admin_id)
            ->get();

        $display_jobClassification = DB::table('job_classifications')
            ->where('admin_id', '=', $admin_id)
            ->get();

        $display_experienceLevel = DB::table('experience_levels')
            ->where('admin_id', '=', $admin_id)
            ->get();        
        
        $display_businessIndustry = DB::table('business_industries')
            ->where('admin_id', '=', $admin_id)
            ->get();    
    
        return view('admin.setting', compact('count_master','display_master','display_salary','display_jobType',
        'display_qualification','display_jobClassification','display_experienceLevel',
        'display_businessIndustry'));

    }
    public function create()
    {
        $admin_id = Auth::guard('admin')->user()->id;
        return view('admin.createMasterData', compact('admin_id'));
    }
    public function store(Request $request)
    {

        $master = new Master([
            'admin_id' => Auth::guard('admin')->user()->id,
            'title'    => $request->get('title'),

        ]);
        $master->save();

        // dd($request->all());
        $job_classification = $request->get('job_classification');
        foreach ($job_classification as $i => $jc) {
            $jobClassification = new JobClassification();
            $jobClassification->admin_id = $request->get('admin_id');
            $jobClassification->job_classification = $jc;
            $jobClassification->save();
        }

        $qualifications = $request->get('qualification');
        foreach ($qualifications as $i => $q) {
            $qualifications = new Qualification();
            $qualifications->admin_id = $request->get('admin_id');
            $qualifications->qualification = $q;
            $qualifications->save();
        }

        $jobType = $request->get('job_type');
        foreach ($jobType as $i => $jt) {
            $jobType = new JobType();
            $jobType->admin_id = $request->get('admin_id');
            $jobType->job_type = $jt;
            $jobType->save();
        }

        $salaryRange = $request->get('salary_range');
        foreach ($salaryRange as $i => $sr) {
            $salaryRange = new SalaryRange();
            $salaryRange->admin_id = $request->get('admin_id');
            $salaryRange->salary_range = $sr;
            $salaryRange->save();
        }

        $experienceLevel = $request->get('experience_level');
        foreach ($experienceLevel as $i => $el) {
            $experienceLevel = new ExperienceLevel();
            $experienceLevel->admin_id = $request->get('admin_id');
            $experienceLevel->experience_level = $el;
            $experienceLevel->save();
        }

        $businessIndustry = $request->get('business_industry');
        foreach ($businessIndustry as $i => $bi) {
            $businessIndustry = new BusinessIndustry();
            $businessIndustry->admin_id = $request->get('admin_id');
            $businessIndustry->business_industry = $bi;
            $businessIndustry->save();
        }

        return redirect('/admin/setting');
    }
    public function edit($id)
    {
        $admin_id = Auth::guard('admin')->user()->id;
        //change $user_id to $id
        $edit_master = Master::find($id);

        $edit_sr = DB::table('salary_ranges')
            ->where('admin_id', '=', $admin_id)
            ->get();

        $edit_jt = DB::table('job_types')
            ->where('admin_id', '=', $admin_id)
            ->get();
        $edit_qu = DB::table('qualifications')
            ->where('admin_id', '=', $admin_id)
            ->get();
        $edit_jc = DB::table('job_classifications')
            ->where('admin_id', '=', $admin_id)
            ->get();
        $edit_ex = DB::table('experience_levels')
            ->where('admin_id', '=', $admin_id)
            ->get();
        
        $edit_bi = DB::table('business_industries')
            ->where('admin_id', '=', $admin_id)
            ->get();

        return view('admin.editMasterData', compact(
            'edit_master','edit_sr','edit_jt','edit_qu','edit_jc','edit_ex', 'edit_bi','admin_id'));
    }
    public function update(Request $request, $id)
    {
        $admin_id = Auth::guard('admin')->user()->id;

        $master = Master::find($id);
        $master->title = $request->get('title');
        $master->save();

        // Job Classification
        $job_classification_id = $request->get("job_classification_id");
        $job_classification = $request->get('job_classification');
        $jobClss = DB::table('job_classifications')
            ->where('admin_id', '=', $admin_id)
            ->get();
        $jobClssIDbase = $jobClss->keyBy("id");
        $job_classification = $request->get('job_classification');
        foreach ($job_classification as $i => $jc) {
            if ($job_classification_id[$i]) {
                unset($jobClssIDbase[$job_classification_id[$i]]);
                $job_classification = JobClassification::find($job_classification_id[$i]);
                $job_classification->job_classification = $jc;
                $job_classification->save();
            } else {
                // add new job classification
                $job_classification = new JobClassification();
                $job_classification->admin_id = $request->get('admin_id');
                $job_classification->job_classification = $jc;
                $job_classification->save();
            }
        }
        if (count($jobClssIDbase)) {
            // delete job classification
            foreach ($jobClssIDbase as $id => $jc) {
                $jc = JobClassification::find($id);
                $jc->delete();
            }
        }

        // Job job types
        $job_type_id = $request->get("job_type_id");
        $job_type = $request->get('job_type');
        $jt = DB::table('job_types')
            ->where('admin_id', '=', $admin_id)
            ->get();
        $jtIDbase = $jt->keyBy("id");
        $job_type = $request->get('job_type');
        foreach ($job_type as $i => $jt) {
            if ($job_type_id[$i]) {
                unset($jtIDbase[$job_type_id[$i]]);
                $job_type = JobType::find($job_type_id[$i]);
                $job_type->job_type = $jt;
                $job_type->save();
            } else {
                // add new job type
                $job_type = new JobType();
                $job_type->admin_id = $request->get('admin_id');
                $job_type->job_type = $jt;
                $job_type->save();
            }
        }
        if (count($jtIDbase)) {
            // delete job type
            foreach ($jtIDbase as $id => $jt) {
                $jt = JobType::find($id);
                $jt->delete();
            }
        }

        // Qualification
        $qualification_id = $request->get("qualification_id");
        $qualification = $request->get('qualification');
        $qu = DB::table('qualifications')
            ->where('admin_id', '=', $admin_id)
            ->get();
        $quIDbase = $qu->keyBy("id");
        $qualification = $request->get('qualification');
        foreach ($qualification as $i => $q) {
            if ($qualification_id[$i]) {
                unset($quIDbase[$qualification_id[$i]]);
                $qualification = Qualification::find($qualification_id[$i]);
                $qualification->qualification = $q;
                $qualification->save();
            } else {
                // add new job Qualification
                $qualification = new Qualification();
                $qualification->admin_id = $request->get('admin_id');
                $qualification->qualification = $q;
                $qualification->save();
            }
        }
        if (count($quIDbase)) {
            // delete job Qualification
            foreach ($quIDbase as $id => $q) {
                $q = Qualification::find($id);
                $q->delete();
            }
        }        

        // Salary Range
        $salary_range_id = $request->get("salary_range_id");
        $salary_range = $request->get('salary_range');
        $sr = DB::table('salary_ranges')
            ->where('admin_id', '=', $admin_id)
            ->get();
        $srIDbase = $sr->keyBy("id");
        $salary_range = $request->get('salary_range');
        foreach ($salary_range as $i => $sr) {
            if ($salary_range_id[$i]) {
                unset($quIDbase[$salary_range_id[$i]]);
                $salary_range = SalaryRange::find($salary_range_id[$i]);
                $salary_range->salary_range = $sr;
                $salary_range->save();
            } else {
                // add new Salary Range
                $salary_range = new SalaryRange();
                $salary_range->admin_id = $request->get('admin_id');
                $salary_range->salary_range = $sr;
                $salary_range->save();
            }
        }
        if (count($srIDbase)) {
            // delete Salary Range
            foreach ($srIDbase as $id => $sr) {
                $sr = SalaryRange::find($id);
                $sr->delete();
            }
        }

        $experience_level_id = $request->get("experience_level_id");
        $experience_level = $request->get('experience_level');
        $ex = DB::table('experience_levels')
            ->where('admin_id', '=', $admin_id)
            ->get();
        $exIDbase = $ex->keyBy("id");
        $experience_level = $request->get('experience_level');
        foreach ($experience_level as $i => $ex) {
            if ($experience_level_id[$i]) {
                unset($biIDbase[$business_industry_id[$i]]);
                $experience_level = ExperienceLevel::find($experience_level_id[$i]);
                $experience_level->experience_level = $ex;
                $experience_level->save();
            } else {
                // add new Experience Level
                $experience_level = new ExperienceLevel();
                $experience_level->admin_id = $request->get('admin_id');
                $experience_level->experience_level = $ex;
                $experience_level->save();
            }
        }
        if (count($exIDbase)) {
            // delete Experience Level
            foreach ($exIDbase as $id => $ex) {
                $ex = ExperienceLevel::find($id);
                $ex->delete();
            }
        }

        // Business Industry
        $business_industry_id = $request->get("business_industry_id");
        $business_industry = $request->get('business_industry');
        $bi = DB::table('business_industries')
            ->where('admin_id', '=', $admin_id)
            ->get();
        $biIDbase = $bi->keyBy("id");
        $business_industry = $request->get('business_industry');
        foreach ($business_industry as $i => $bi) {
            if ($business_industry_id[$i]) {
                unset($biIDbase[$business_industry_id[$i]]);
                $business_industry = BusinessIndustry::find($business_industry_id[$i]);
                $business_industry->business_industry = $bi;
                $business_industry->save();
            } else {
                // add new Business Industry
                $business_industry = new BusinessIndustry();
                $business_industry->admin_id = $request->get('admin_id');
                $business_industry->business_industry = $bi;
                $business_industry->save();
            }
        }
        if (count($biIDbase)) {
            // delete Business Industry
            foreach ($biIDbase as $id => $bi) {
                $bi = BusinessIndustry::find($id);
                $bi->delete();
            }
        }

        return redirect('/admin/setting');
    
    }
}
