<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\ServiceApproval;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class VerifyPackageController extends Controller
{
    public function index() 
    {
        $approval = DB::table('service_approvals')
                ->join('companies', 'service_approvals.company_id', '=', 'companies.id')
                ->join('payments', 'service_approvals.payment_id', '=', 'payments.id')
                ->join('services', 'service_approvals.service_id', '=', 'services.id')
                ->select(
                    'companies.company_profile as company_profile',
                    'companies.name as company_name',
                    'companies.id as company_id',
                    'companies.phone_number as company_phone_number',
                    'payments.type_of_payment as type_of_payment',
                    'services.title as service_title',
                    'services.price as service_price',
                    'service_approvals.*'  
                )
                ->get();
        return view('admin.packgeRequest', compact('approval'));
    }
    public function show(Request $request, $id)
    {
        $approval = DB::table('service_approvals')
                ->where('company_id', '=' ,$id)
                ->join('companies', 'service_approvals.company_id', '=', 'companies.id')
                ->join('payments', 'service_approvals.payment_id', '=', 'payments.id')
                ->join('services', 'service_approvals.service_id', '=', 'services.id')
                ->select(
                    'companies.company_profile as company_profile',
                    'companies.name as company_name',
                    'companies.phone_number as company_phone_number',
                    'payments.type_of_payment as type_of_payment',
                    'services.title as service_title',
                    'services.price as service_price',
                    'service_approvals.*'  
                )
                ->get();

        return view('admin.verifyPackge', compact('approval'));
    }

    public function edit(Request $request, $id)
    {
        $approval = DB::table('service_approvals')
                ->where('company_id', '=' ,$id)
                ->join('companies', 'service_approvals.company_id', '=', 'companies.id')
                ->join('payments', 'service_approvals.payment_id', '=', 'payments.id')
                ->join('services', 'service_approvals.service_id', '=', 'services.id')
                ->select(
                    'companies.company_profile as company_profile',
                    'companies.name as company_name',
                    'companies.phone_number as company_phone_number',
                    'payments.type_of_payment as type_of_payment',
                    'services.title as service_title',
                    'services.price as service_price',
                    'service_approvals.*'  
                )
                ->get();

        return view('admin.verifyPackge', compact('approval'));
    }

    public function update(Request $request, $id)
    {
        $service_approvals = ServiceApproval::find($id);
        $service_approvals->approve = $request->get('approve');
        $service_approvals->update();

        return redirect('/packgeRequest')->with('edit_service_approvals', $service_approvals);
    }

}
