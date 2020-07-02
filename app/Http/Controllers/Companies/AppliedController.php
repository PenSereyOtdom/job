<?php

namespace App\Http\Controllers\Companies;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use session;


class AppliedController extends Controller
{
    public function index()
    {
        // mark notification as read if company clicks on APPLYJOB notification....
        $unread_notifications = auth()->guard('company')->user()->unreadnotifications;
        foreach($unread_notifications as $notif){
            if($notif->type=='App\Notifications\UserAppliedJob'){
                $notif->markAsRead();
            }
        }

        $company_id = Auth::guard('company')->user()->id;
        $applies_table = DB::table('applies')
            ->where('company_id', '=', $company_id)
            ->where('confirmed', '=', '1')
            ->join('job_posts', 'applies.job_post_id', '=', 'job_posts.id')
            ->join('users', 'applies.user_id', '=', 'users.id')
            ->select(
                'users.name as username',
                'job_posts.job_title as job_title',
                'applies.id as apply_id',
                'users.id as user_id',
                'applies.confirmed as confirmed',
                'applies.created_at as created_at' 
            )
            ->get();
        return view('companies.applied', compact('applies_table'));
    }
    public function create()
    {
        return view('companies.applied');
    }
}
