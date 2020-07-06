<?php

namespace App\Http\Controllers\Users;

use DB;
use PDF;
use App\Models\Cv;
use App\Models\User;
use App\Models\Apply;
use App\Models\JobPost;
use App\Models\Language;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CvController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::id();
        $display_cv = DB::table('cvs')
            ->where('user_id', '=', $user_id)
            ->get();
        $count_cv = count($display_cv);

        $display_experience = DB::table('experiences')
            ->where('user_id', '=', $user_id)
            ->get();

        $display_achievement = DB::table('achievements')
            ->where('user_id','=', $user_id)
            ->get();

        $display_education = DB::table('education')
            ->where('user_id', '=', $user_id)
            ->get();

        $display_language = DB::table('languages')
            ->where('user_id', '=', $user_id)
            ->get();

        return view('users.cv', compact('display_cv','display_experience',
                    'display_achievement','display_education','display_language',
                    'display_experience','count_cv','user_id'));
    }
    public function create()
    {
        $user_id = Auth::id();
        return view('users.createCv', compact('user_id'));
    }
    public function store(Request $request)
    {
        // FYI, these keywords like required, max can be found in resources/lang/validation.php
        $request->validate([
            'full_name' => 'required|max:120',
            // 'email' => 'required|email',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'summary' => 'required'

        ]);
        $cv = new Cv([
            'user_id' => Auth::user()->id,
            'full_name'    => $request->get('full_name'),
            'email'    => $request->get('email'),
            'phone_number'    => $request->get('phone_number'),
            'summary'    => $request->get('summary'),
        ]);
        $cv->save();
        $workplace_names = $request->get('exp_workplace_name');
        $exp_titles = $request->get('exp_title');
        $exp_start_dates = $request->get('exp_start_date');
        $exp_end_dates = $request->get('exp_end_date');
        $exp_details = $request->get('exp_detail');
        foreach ($workplace_names as $i => $wpn) {
            $experience = new Experience();
            $experience->user_id = $request->get('user_id');
            $experience->exp_workplace_name = $wpn;
            $experience->exp_title = $exp_titles[$i];
            $experience->exp_start_date = $exp_start_dates[$i];
            $experience->exp_end_date = $exp_end_dates[$i];
            $experience->exp_detail = $exp_details[$i];
            $experience->save();
        }

        $school_names = $request->get('school_name');
        $edu_start_dates = $request->get('edu_start_date');
        $edu_end_dates = $request->get('edu_end_date');
        $majors = $request->get('major');
        $edu_details = $request->get('edu_detail');
        foreach ($school_names as $i => $te) {
            $education = new Education();
            $education->user_id = $request->get('user_id');
            $education->school_name = $te;
            $education->edu_start_date = $edu_start_dates[$i];
            $education->edu_end_date = $edu_end_dates[$i];
            $education->major = $majors[$i];
            $education->edu_detail = $edu_details[$i];
            $education->save();
        }

        $ach_titles = $request->get('ach_title');
        $ach_dates = $request->get('ach_date');
        $ach_details = $request->get('ach_detail');
        foreach ($ach_titles as $i => $ta) {
            $achievement = new Achievement();
            $achievement->user_id = $request->get('user_id');
            $achievement->ach_title = $ta;
            $achievement->ach_date = $ach_dates[$i];
            $achievement->ach_detail = $ach_details[$i];
            $achievement->save();
        }

        $lang = $request->get('lang');
        $level = $request->get('level');
        foreach ($lang as $i => $l) {
            $language = new Language();
            $language->user_id = $request->get('user_id');
            $language->lang = $l;
            $language->level = $level[$i];
            $language->save();
        }

        return redirect('/cv');
    }
    public function edit($id)
    {
        $user_id = Auth::id();
        //change $user_id to $id
        $edit_cv = Cv::find($id);
        $edit_exp = DB::table('experiences')
        ->where('user_id', '=', $user_id)
            ->get();
        $edit_ach = DB::table('achievements')
        ->where('user_id', '=', $user_id)
            ->get();
        $edit_edu = DB::table('education')
        ->where('user_id', '=', $user_id)
            ->get();
        $edit_lang = DB::table('languages')
        ->where('user_id', '=', $user_id)
            ->get();
        return view('users.editCv', compact(
            'edit_cv','edit_exp','edit_edu','edit_ach','edit_lang', 'user_id'));
    }
    public function update(Request $request, $id)
    {   
        $user_id = Auth::id();
        $cv = Cv::find($id);
        $cv->full_name = $request->get('full_name');
        $cv->email = $request->get('email');
        $cv->phone_number = $request->get('phone_number');
        $cv->summary = $request->get('summary');
        $cv->save();

        $exp_id = $request->get("exp_id");
        $workplace_names = $request->get('exp_workplace_name');
        $userExp = DB::table('experiences')
            ->where('user_id', '=', $user_id)
            ->get();
        $userExpIDbase = $userExp->keyBy("id");
        $exp_titles = $request->get('exp_title');
        $exp_start_dates = $request->get('exp_start_date');
        $exp_end_dates = $request->get('exp_end_date');
        $exp_details = $request->get('exp_detail');
        foreach ($workplace_names as $i => $wpn) {
            if ($exp_id[$i]) {
                unset($userExpIDbase[$exp_id[$i]]);
                $experience = Experience::find($exp_id[$i]);
                $experience->exp_workplace_name = $wpn;
                $experience->exp_title = $exp_titles[$i];
                $experience->exp_start_date = $exp_start_dates[$i];
                $experience->exp_end_date = $exp_end_dates[$i];
                $experience->exp_detail = $exp_details[$i];
                $experience->save();
            } else {
                // add new experience
                $experience = new Experience();
                $experience->user_id = $request->get('user_id');
                $experience->exp_workplace_name = $wpn;
                $experience->exp_title = $exp_titles[$i];
                $experience->exp_start_date = $exp_start_dates[$i];
                $experience->exp_end_date = $exp_end_dates[$i];
                $experience->exp_detail = $exp_details[$i];
                $experience->save();
            }
        }

        if (count($userExpIDbase)) {
            // delete exp
            foreach ($userExpIDbase as $id => $exp) {
                $exp = Experience::find($id);
                $exp->delete();
            }
        }

            $edu_id = $request->get("edu_id");
            $school_names = $request->get('school_name');
            $userEdu = DB::table('education')
                ->where('user_id', '=', $user_id)
                ->get();
            $userEduIDbase = $userEdu->keyBy("id");
            $edu_start_dates = $request->get('edu_start_date');
            $edu_end_dates = $request->get('edu_end_date');
            $majors = $request->get('major');
            $edu_details = $request->get('edu_detail');

            foreach ($school_names as $i => $te) {
                if ($edu_id[$i]) {
                    //update education
                    unset($userEduIDbase[$edu_id[$i]]);
                        $education = Education::find($edu_id[$i]);
                        $education->school_name = $te;
                        $education->edu_start_date = $edu_start_dates[$i];
                        $education->edu_end_date = $edu_end_dates[$i];
                        $education->major = $majors[$i];
                        $education->edu_detail = $edu_details[$i];
                        $education->save();
                } else {
                    // add new education
                    $education = new Education();
                    $education->user_id = $request->get('user_id');
                    $education->school_name = $te;
                    $education->edu_start_date = $edu_start_dates[$i];
                    $education->edu_end_date = $edu_end_dates[$i];
                    $education->major = $majors[$i];
                    $education->edu_detail = $edu_details[$i];
                    $education->save();
                }
            }

        if (count($userEduIDbase)) {
            // delete edu
            foreach ($userEduIDbase as $id => $edu) {
                $edu = Education::find($id);
                $edu->delete();
            }
        }

        $ach_id = $request->get("ach_id");
        $userAch = DB::table('achievements')
                ->where('user_id', '=', $user_id)
                ->get();
        $userAchIDbase = $userAch->keyBy("id");
        $ach_titles = $request->get('ach_title');
        $ach_dates = $request->get('ach_date');
        $ach_details = $request->get('ach_detail');

        foreach ($ach_titles as $i => $ta) {
            if ($ach_id[$i]) {
                //update education
                unset($userAchIDbase[$ach_id[$i]]);
                    $achievement = Achievement::find($ach_id[$i]);
                    $achievement->ach_title = $ta;
                    $achievement->ach_date = $ach_dates[$i];
                    $achievement->ach_detail = $ach_details[$i];
                    $achievement->save();
            } else {
                // add new education
                $achievement = new Achievement();
                $achievement->user_id = $request->get('user_id');
                $achievement->ach_title = $ta;
                $achievement->ach_date = $ach_dates[$i];
                $achievement->ach_detail = $ach_details[$i];
                $achievement->save();

            }
        }
        if (count($userAchIDbase)) {
            // delete ach
            foreach ($userAchIDbase as $id => $ach) {
                $ach = Achievement::find($id);
                $ach->delete();
            }
        }

        $lang_id = $request->get("lang_id");
        $lang = $request->get('lang');
        $level = $request->get('level');
        $userLangs = DB::table('languages')
            ->where('user_id', '=', $user_id)
            ->get();
        $userLangsIDbase = $userLangs->keyBy("id");

        foreach ($lang as $i => $l) {
            if ($lang_id[$i]) {
                //update education
                unset($userAchIDbase[$lang_id[$i]]);
                    $language = Language::find($lang_id[$i]);
                    $language->lang = $l;
                    $language->level = $level[$i];
                    $language->save();
            } else {
                // add new education
                $language = new Language();
                $language->user_id = $request->get('user_id');
                $language->lang= $l;
                $language->level = $level[$i];
                $language->save();
            }
        }

        if (count($userLangsIDbase)) {
            // delete lang
            foreach ($userLangsIDbase as $id => $lang) {
                $lang = Language::find($id);
                $lang->delete();
            }
        }

        return redirect('/cv');
    }

    public function destroy($id)
    {
        $cv = CV::find($id);
        $cv->delete();

        return redirect('/cv');
    }
}
