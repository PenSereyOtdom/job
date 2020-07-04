<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $admin_id = Auth::guard('admin')->user()->id;
        $payment_cash = DB::table('payments')
            ->where('admin_id', '=', $admin_id)
            ->where('type_of_payment', '=', 'Cash')
            ->get();

        $payment_aba = DB::table('payments')
            ->where('admin_id', '=', $admin_id)
            ->where('type_of_payment', '=', 'ABA')
            ->get();

        $payment_wing = DB::table('payments')
            ->where('admin_id', '=', $admin_id)
            ->where('type_of_payment', '=', 'Wing')
            ->get();

        $contact = DB::table('payments')
            ->where('admin_id', '=', $admin_id)
            ->get();

        return view('admin.payments', compact('payment_cash', 'payment_aba', 'payment_wing', 'contact'));
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

        return view('admin.editPayment', compact('edit_cash','editPayment','edit_aba','edit_wing'));

    }

    public function update(Request $request, $id)
    {
        
        $payment = Payment::find($id);
        $payment->type_of_payment = $request->get('type_of_payment');
        $payment->address = $request->get('address');
        $payment->map = $request->get('map');
        $payment->acc_name = $request->get('acc_name');
        $payment->acc_number = $request->get('acc_number');
        $payment->contact = $request->get('contact');

        $payment->update();

        return redirect('/payments')->with('editPayment, $payment');
    }

}
