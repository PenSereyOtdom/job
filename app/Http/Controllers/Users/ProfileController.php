<?php

namespace App\Http\Controllers\Users;

use DB;
use File;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user_id = Auth::id();
        $user_info = DB::table('users')
            ->where('id', '=', $user_id)
            ->get();

        $edit_info = User::find($user_id);
        return view('users.profile', compact('user_info', 'edit_info'));
    }
 
    public function update(Request $request, $id)
    {
        //create update obj with user PK
        $update = User::find($id);

        $request->validate([
            'user_profile.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //check if user upload file
        if ($request->hasFile('user_profile')) {
            // Get filename with extension            
            $filenameWithExt = $request->file('user_profile')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('user_profile')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('user_profile')->storeAs('user_profile', $fileNameToStore);
            //delete the previus stored file
            if ( $update->user_profile != null ) {
                File::delete('storage/user_profile/' . $update->user_profile);
            }
            //append filename to update variabale
            $update->user_profile = $fileNameToStore;
        }

        $update->name = $request->get('name');
        $update->email = $request->get('email');
        $update->phone_number = $request->get('phone_number');

        $update->save();

        return redirect('/profile')->with('edit_info', $update);

    }

    public function appliedJob(Request $request)
    {
        $appliedJobs = DB::table('applies')
            ->where('user_id', '=', auth()->user()->id)
            ->where('confirmed', '=', '1')
            ->join('job_posts', 'applies.job_post_id', '=', 'job_posts.id')
            ->join('companies', 'job_posts.company_id', '=', 'companies.id')
            ->select('companies.name as name',
                    'companies.company_profile as profile',
                    'applies.created_at as applied_at',
                    'job_posts.*'
                    )
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $count_applied = count($appliedJobs);
        
        return view('users.appliedJob', compact('appliedJobs', 'count_applied'));
    }

    public function deletedJob(Request $request)
    {
        $appliedJobs = DB::table('applies')
            ->where('user_id', '=', auth()->user()->id)
            ->where('confirmed', '=', '1')
            ->where('job_post_id','=',$request['id']);

        $appliedJobs->delete();

        return redirect()->back();
    }

    public function savedJob(Request $request)
    {
        $savedJobs = DB::table('save_jobs')
            ->where('user_id', '=', auth()->user()->id)
            ->where('saved', '=', '1')
            ->join('job_posts', 'save_jobs.job_post_id', '=', 'job_posts.id')
            ->join('companies', 'job_posts.company_id', '=', 'companies.id')
            ->select('companies.name as name',
                    'companies.company_profile as profile',
                    'save_jobs.created_at as saved_at',
                    'job_posts.*'
                    )
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $count_saved = count($savedJobs);
        
        return view('users.savedJob', compact('savedJobs', 'count_saved'));
    }

    public function showChangePasswordForm()
    {
        return view('user.profile');
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
