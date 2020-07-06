<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    public function index(Request $request)
    {
        $admin_id = Auth::guard('admin')->user()->id;
        $service_trial = DB::table('services')
            ->where('admin_id', '=', $admin_id)
            ->where('title', '=', 'Trial Plan')
            ->get();

        $service_basic = DB::table('services')
            ->where('admin_id', '=', $admin_id)
            ->where('title', '=', 'Basic Plan')
            ->get();

        $service_urgent = DB::table('services')
            ->where('admin_id', '=', $admin_id)
            ->where('title', '=', 'Urgent Plan')
            ->get();

        $service_premium = DB::table('services')
            ->where('admin_id', '=', $admin_id)
            ->where('title', '=', 'Premium Plan')
            ->get();

        return view('admin.service', compact('service_trial', 'service_basic', 'service_urgent', 'service_premium'));
    }

    public function edit($id)
    {
        
        $editService = Service::find($id);

        $edit_trial = DB::table('services')
            ->where('title', '=', 'Trial Plan')
            ->get();

        $edit_basic = DB::table('services')
            ->where('title', '=', 'Basic Plan')
            ->get();

        $edit_urgent = DB::table('services')
            ->where('title', '=', 'Urgent Plan')
            ->get();

        $edit_premium = DB::table('services')
            ->where('title', '=', 'Premium Plan')
            ->get();

        return view('admin.editService', compact('editService','edit_trial','edit_basic','edit_urgent','edit_premium'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $service->price = $request->get('price');
        $service->number_of_post = $request->get('number_of_post');
        $service->valid_days = $request->get('valid_days');

        $service->update();

        return redirect('/service')->with('editService, $service');
    }
    
}
