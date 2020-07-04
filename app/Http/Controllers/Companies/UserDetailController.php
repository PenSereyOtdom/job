<?php

namespace App\Http\Controllers\Companies;

use DB;
use PDF;
use File;
use App\Cv;
use App\User;
use App\Admin;
use App\Experience;
use App\Education;
use App\Achievement;
use App\Language;
use App\Apply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserDetailController extends Controller
{
    public function show($id)
    {
        $user_id = Auth::id();

        $users = DB::table('users')
            ->where('id', '=', $user_id)
            ->get();

        $userDetail = DB::table('cvs')
            ->where('user_id', '=', $user_id)
            ->get();

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

        $apply = DB::table('applies')
            ->where('user_id', '=', $user_id)
            ->get();

        return view('companies.userDetail', compact('users','userDetail', 'display_experience', 'display_education', 'display_achievement', 'display_language','apply'));
    }

    public function downloadPDF(Request $request, $id) 
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

        $pdf = PDF::loadView('companies.pdf', compact('display_cv', 'display_experience','users',
                            'display_education', 'display_achievement', 'display_language'));
        
        return $pdf->download('cv.pdf');
    }

}
