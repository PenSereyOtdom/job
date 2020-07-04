<?php

namespace App\Http\Controllers\Admin;

use DB;
use File;
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
            ->where('type_of_payment', '=', 'Contact')
            ->get();

        return view('admin.payments', compact('payment_cash', 'payment_aba', 'payment_wing', 'contact'));
    }
    public function edit($id)
    {
        $editPayment = Payment::find($id);

        $edit_cash = DB::table('payments')
            ->where('type_of_payment', '=', 'Cash')
            ->get();

        return view('admin.editPayment', compact('edit_cash','editPayment'));

    }
    public function editaba($id)
    {
        $editPayment = Payment::find($id);

        $edit_aba = DB::table('payments')
            ->where('type_of_payment', '=', 'ABA')
            ->get();

        return view('admin.paymentAba', compact('editPayment','edit_aba'));

    }
    public function editwing($id)
    {
        $editPayment = Payment::find($id);

        $edit_wing = DB::table('payments')
            ->where('type_of_payment', '=', 'Wing')
            ->get();

        return view('admin.paymentWing', compact('editPayment','edit_wing'));

    }
    public function editcontact($id)
    {
        $editPayment = Payment::find($id);
            
        $edit_contact = DB::table('payments')
            ->where('type_of_payment', '=', 'Contact')
            ->get();

        return view('admin.contact', compact('editPayment','edit_contact'));
    }
    public function update(Request $request, $id)
    {
        
        $payment = Payment::find($id);

        // $request->validate([
        //     'qr_aba.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'qr_wing.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        // ]);

        if ($request->hasFile('qr_aba')) {
            $filenameWithExt = $request->file('qr_aba')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('qr_aba')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('qr_aba')->storeAs('qr_aba', $fileNameToStore);
            if ( $payment->qr_aba != null ) {
                File::delete('storage/qr_aba/' . $payment->qr_aba);
            }
            $payment->qr_aba = $fileNameToStore;
        }

        if ($request->hasFile('qr_wing')) {
            // Get filename with extension            
            $filenameWithExt = $request->file('qr_wing')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('qr_wing')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('qr_wing')->storeAs('qr_wing', $fileNameToStore);
            //delete the previus stored file
            if ( $payment->qr_wing != null ) {
                File::delete('storage/qr_wing/' . $payment->qr_wing);
            }
            //append filename to update variabale
            $payment->qr_wing = $fileNameToStore;
        }

        $payment->address = $request->get('address');
        $payment->map = $request->get('map');
        $payment->acc_name = $request->get('acc_name');
        $payment->acc_number = $request->get('acc_number');
        $payment->contact1 = $request->get('contact1');
        $payment->contact2 = $request->get('contact2');
        $payment->gmail = $request->get('gmail');


        $payment->update();

        return redirect('/payments')->with('editPayment, $payment');
    }

}
