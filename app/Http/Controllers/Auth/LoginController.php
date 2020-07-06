<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\SMSHelper;
use App\Models\User;
use App\Models\Admin;
use App\Models\Company;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:company')->except('logout');
    }


    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }


    public function showCompanyLoginForm()
    {
        return view('auth.login', ['url' => 'company']);
    }


    public function adminLogin(Request $request)
    {

        $admin = Auth::guard('admin')->attempt(['name' => $request['username'], 'password' => $request['password']]);

        if($admin){
            $check_verify  = DB::table('admins')->where('name','=', Auth::guard('admin')->id())->first();
            return redirect()->intended('/admin');
        } else {
            return back()->with(['error' => 'user is not exite in your database']);
        }
        return back()->withInput($request->only('phone_number', 'remember'));

    }

    public function companyLogin(Request $request)
    {
    
        $company = Auth::guard('company')->attempt(['name' => $request['username'], 'password' => $request['password']]);

        if($company) {
            
            if(Auth::guard('company')->user()->isVerified == 0) {
                SMSHelper::sms(Auth::guard('company')->user()->phone_number);
                $phone  = $check_verify->phone_number;
                return redirect()->route('verify/company')->with(['phone_number' => $phone]);
            } else {
                return redirect()->intended('/company');
            }

        } else {
            return back()->with(['error' => 'user isnot exite in your database']);
        }

        return back()->withInput($request->only('name', 'remember'));
        
    }

    public function login(Request $request)
    {
        
        $user = Auth::attempt(['name' => $request['username'], 'password' => $request['password']]) || Auth::attempt(['phone_number' => $request['code'].$request['phone_number'], 'password' => $request['password']]) ;
        
        if ($user) {

            if($user-user()->isVerified->isVerified == 0) {
                SMSHelper::sms($check_verify->phone_number);
                $phone  = $check_verify->phone_number;
                return redirect()->route('verify')->with(['phone_number' => $phone]);
            } else {
                return redirect()->intended('/home');
            }
           
        } else {
            return back()->with(['error' => 'user is not exite in your database']);
        }
        return back()->withInput($request->only('phone_number', 'remember'));
        
    }
    
}
