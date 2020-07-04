<?php

namespace App\Http\Controllers\Companies;

use DB;
use App\ServiceApproval;
use App\Payment;
use App\Admin;
use App\User;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CompanyBuyPlan;


class PaymentController extends Controller
{
    public function index()
    {
        $payment_cash = DB::table('payments')
            ->where('type_of_payment', '=', 'Cash')
            ->get();

        $payment_aba = DB::table('payments')
            ->where('type_of_payment', '=', 'ABA')
            ->get();

        $payment_wing = DB::table('payments')
            ->where('type_of_payment', '=', 'Wing')
            ->get();

        $contact = DB::table('payments')
            ->where('type_of_payment', '=', 'Contact')
            ->get();

        return view('companies.payment', compact('payment_cash', 'payment_aba', 'payment_wing', 'contact'));
    }
    public function indexbasic(Request $request,$service_id)
    {
        $service_approval__check =  $this->servicecheck($service_id);
        $unread_notifications = auth()->guard('company')->user()->unreadnotifications;
        foreach($unread_notifications as $notif){
            if($notif->type=='App\Notifications\UserAppliedJob'){
                $notif->markAsRead();
            }
        }

        $payment_cash = DB::table('payments')
            ->where('type_of_payment', '=', 'Cash')
            ->get();

        $payment_aba = DB::table('payments')
            ->where('type_of_payment', '=', 'ABA')
            ->get();

        $payment_wing = DB::table('payments')
            ->where('type_of_payment', '=', 'Wing')
            ->get();

        return view('companies.basic', compact('payment_cash', 'payment_aba', 'payment_wing','service_approval__check'));
    }

    public function storebasic(Request $request)
    {
        $payment_package = [$request->get('admin_id'),$request->get('payment_id'),$request->get('service_id'),
                            $request->get('transaction_aba'), $request->get('transaction_wing')];
        $payment = $this->checkPayment($payment_package);
        $company = auth()->guard('company')->user();
        Admin::find(1)->notify(new CompanyBuyPlan($company));
        return redirect()->back();

        return redirect('/serviceListing');
    }

    public function indextrail(Request $request,$service_id)
    {

        $service_approval__check =  $this->servicecheck($service_id);
        $payment_cash = DB::table('payments')
            ->where('type_of_payment', '=', 'Cash')
            ->get();

        $payment_aba = DB::table('payments')
            ->where('type_of_payment', '=', 'ABA')
            ->get();

        $payment_wing = DB::table('payments')
            ->where('type_of_payment', '=', 'Wing')
            ->get();

        

        return view('companies.trail', compact('payment_cash', 'payment_aba', 'payment_wing','service_approval__check'));
    }
    
    public function storetrail(Request $request)
    {
        
        $payment_package = [$request->get('admin_id'),$request->get('payment_id'),$request->get('service_id'),
                            $request->get('transaction_aba'), $request->get('transaction_wing')];
        $payment = $this->checkPayment($payment_package);

        $company = auth()->guard('company')->user();
        Admin::find(1)->notify(new CompanyBuyPlan($company));
        return redirect()->back();

        return redirect('/serviceListing');
    }

    public function indexurgent(Request $request,$service_id)
    {
        
        $service_approval__check =  $this->servicecheck($service_id);
        $payment_cash = DB::table('payments')
            ->where('type_of_payment', '=', 'Cash')
            ->get();

        $payment_aba = DB::table('payments')
            ->where('type_of_payment', '=', 'ABA')
            ->get();

        $payment_wing = DB::table('payments')
            ->where('type_of_payment', '=', 'Wing')
            ->get();

        return view('companies.urgent', compact('payment_cash', 'payment_aba', 'payment_wing','service_approval__check'));
    }
    
    public function storeurgent(Request $request)
    {

        $payment_package = [$request->get('admin_id'),$request->get('payment_id'),$request->get('service_id'),
        $request->get('transaction_aba'), $request->get('transaction_wing')];
        $payment = $this->checkPayment($payment_package);
        
        $company = auth()->guard('company')->user();
        Admin::find(1)->notify(new CompanyBuyPlan($company));
        return redirect()->back();

        return redirect('/serviceListing');
    }

    public function indexpremium(Request $request,$service_id)
    {
        $service_approval__check =  $this->servicecheck($service_id);
        $payment_cash = DB::table('payments')
            ->where('type_of_payment', '=', 'Cash')
            ->get();

        $payment_aba = DB::table('payments')
            ->where('type_of_payment', '=', 'ABA')
            ->get();

        $payment_wing = DB::table('payments')
            ->where('type_of_payment', '=', 'Wing')
            ->get();

        return view('companies.premium', compact('payment_cash', 'payment_aba', 'payment_wing','service_approval__check'));
    }
    
    public function storepremium(Request $request)
    {       

        $payment_package = [$request->get('admin_id'),$request->get('payment_id'),$request->get('service_id'),
                            $request->get('transaction_aba'), $request->get('transaction_wing')];
        $payment = $this->checkPayment($payment_package);
        $company = auth()->guard('company')->user();
        Admin::find(1)->notify(new CompanyBuyPlan($company));
        return redirect()->back();

        return redirect('/serviceListing');
    }

    public function edit($id)
    {
        $editPayment = Payment::find($id);

        $edit_cash = DB::table('payments')
            ->where('type_of_payment', '=', 'Cash')
            ->get();

        $edit_aba = DB::table('payments')
            ->where('type_of_payment', '=', 'ABA')
            ->get();

        $edit_wing = DB::table('payments')
            ->where('type_of_payment', '=', 'Wing')
            ->get();

        return view('companies.payment', compact('edit_cash','editPayment','edit_aba','edit_wing'));
    }

   private function servicecheck($service_id) 
   {
       return $service_approval__check = DB::table('service_approvals')
       ->where('company_id', '=',Auth::guard('company')->user()->id)
       ->where('service_id', '=',$service_id)
       ->get();
   }

   private function checkPayment($service_approval) 
   {
        $service = DB::table("services")
        ->where('id','=',$service_approval[2])
        ->first();
    
        $service_check = DB::table('service_approvals')
        ->where('company_id','=',Auth::guard('company')->user()->id)
        ->where('service_id','=',$service_approval[2]);
       
        if(count($service_check->get()) == 0) {
            $service_approval = new ServiceApproval([
                'company_id' => Auth::guard('company')->user()->id,
                'admin_id' => $service_approval[0],
                'payment_id' => $service_approval[1],
                'service_id' => $service_approval[2],
                'approve' => 0,
                'transaction_aba' => $service_approval[3],
                'transaction_wing' => $service_approval[4],
                'post_number' => $service->number_of_post,
                'value_data' => $service->valid_days
            ]);
            $service_approval->save();
        } else {
            if($service_check->first()->post_number == 0) {
                $service_check->update(['post_number' => $service->number_of_post,
                                        'approve' => 0]);
            } else {
                $service_check->decrement('post_number',1);
            }
        }
   }

}
