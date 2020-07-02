<?php

namespace App\Http\Controllers\Companies;

use DB;
use File;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Storage;

class CompaniesSettingController extends Controller
{
    public function index()
    {
        $company_id = Auth::guard('company')->user()->id;
        $company = DB::table('companies')
            ->where('id', '=', $company_id)
            ->get();
        return view('companies.setting', compact('company'));
    }
    public function create()
    {
        return view('companies.setting');
    }
    public function edit($id)
    {
        $edit_info = Company::find($id);
        return view('companies.editInfo')->with('edit_info', $edit_info);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:20',
        ]);
        //create update obj with user PK
        $upload = Company::find($id);
        $request->validate([
            'company_profile.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        
        //upload profile_picture
        if ($request->hasFile('company_profile')) {
            // Get filename with extension            
            $filenameWithExt = $request->file('company_profile')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('company_profile')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('company_profile')->storeAs('company_profile', $fileNameToStore);
            //delete the previus stored file
            if ( $upload->company_profile != null ) {
                File::delete('storage/company_profile/' . $upload->company_profile);
            }
            //append filename to update variabale
            $upload->company_profile = $fileNameToStore;
            
        }

        $upload->name = $request->get('name');
        $upload->phone_number = $request->get('phone_number');
        $upload->address = $request->get('address');
        $upload->city = $request->get('city');
        $upload->website = $request->get('website');
        $upload->recruiter_name = $request->get('recruiter_name');
        $upload->recruiter_position = $request->get('recruiter_position');

        $upload->save();
        return redirect('/company/setting')->with('edit_info', $upload);
    }
    public function showChangePasswordForm()
    {
        return view('companies.setting');
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
