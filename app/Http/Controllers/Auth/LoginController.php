<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Auth;

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

    protected function credentials(Request $request)
    {    
        if(is_numeric($request->get('email'))){
        return ['phone_number' =>$request->get('email'),'password'=>$request->get('password')];
        }else{
            return ['name' =>$request->get('email'),'password'=>$request->get('password')];
        }

        return $request->only($this->username(), 'password');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {

        // dd(request()->all());
        // $this->validate($request, [
            // 'name'   => 'required',
            // 'phone_number'   => 'required',
            // 'password' => 'required|min:6'
        // ]);
        
        if(Auth::guard('admin')->attempt(['phone_number' => request('email'), 'password' => request('password')]) || Auth::guard('admin')->attempt(['name' => request('email'), 'password' => request('password')]) ){
            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('phone_number', 'remember'));

    }

    public function showCompanyLoginForm()
    {
        return view('auth.login', ['url' => 'company']);
    }

    public function companyLogin(Request $request)
    {
        // $this->validate($request, [
            // 'name'   => 'required',
            // 'phone_number'   => 'required',
            // 'password' => 'required|min:6'
        // ]);


        if(Auth::guard('company')->attempt(['phone_number' => request('email'), 'password' => request('password')]) || Auth::guard('company')->attempt(['name' => request('email'), 'password' => request('password')]) ){
            return redirect()->intended('/company');
        }
        return back()->withInput($request->only('phone_number', 'remember'));
        
    }
    
}
