<?php

namespace App\Http\Controllers\Admin;

use DB;
use File;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminSettingController extends Controller
{
    public function index(Request $request)
    {
        $admin_id = Auth::guard('admin')->user()->id;
        $admin = DB::table('admins')
            ->where('id', '=', $admin_id)
            ->get();

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
        
        return view('admin.setting', compact('admin','count_master','display_master','display_salary','display_jobType',
        'display_qualification','display_jobClassification','display_experienceLevel',
        'display_businessIndustry'));
    }
    public function create()
    {
        return view('admin.setting');
    }
    public function edit($id)
    {
        $edit_info = Admin::find($id);
        return view('admin.editSetting')->with('edit_info', $edit_info);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:20',
        ]);
        //create update obj with user PK
        $upload = Admin::find($id);
        $request->validate([
            'admin_profile.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        
        //upload profile_picture
        if ($request->hasFile('admin_profile')) {
            // Get filename with extension            
            $filenameWithExt = $request->file('admin_profile')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('admin_profile')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('admin_profile')->storeAs('admin_profile', $fileNameToStore);
            //delete the previus stored file
            if ( $upload->company_profile != null ) {
                File::delete('storage/admin_profile/' . $upload->admin_profile);
            }
            //append filename to update variabale
            $upload->admin_profile = $fileNameToStore;
            
        }

        $upload->name = $request->get('name');
        $upload->phone_number = $request->get('phone_number');

        $upload->save();
        return redirect('/admin/setting')->with('edit_info', $upload);
    }

    public function showChangePasswordForm()
    {
        return view('admin.setting');
    }

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }
}
