<?php

namespace App\Http\Controllers\Companies;

use DB;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function serviceListing(Request $request)
    {

        $service_trial = DB::table('services')
            ->where('title', '=', 'Trial Plan')
            ->get();

        $service_basic = DB::table('services')
            ->where('title', '=', 'Basic Plan')
            ->get();          

        $service_urgent = DB::table('services')
            ->where('title', '=', 'Urgent Plan')
            ->get();       

        $service_premium = DB::table('services')
            ->where('title', '=', 'Premium Plan')
            ->get();

        return view('companies.serviceListing', compact('service_trial', 'service_basic', 'service_urgent', 'service_premium'));

    }

}
