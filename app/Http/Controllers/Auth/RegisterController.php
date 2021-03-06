<?php

namespace App\Http\Controllers\Auth;
use DB;
use App\Models\User;
use App\Models\Admin;
use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;

use  App\Helpers\SMSHelper;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:company');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    public function showCompanyRegisterForm()
    {
        return view('auth.register', ['url' => 'company']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */


    protected function createUser(Request $request)
    {
        
        $this->validator($request->all())->validate();
        $user = DB::table('users')
        ->where('phone_number','=',$request['code'].$request['phone_number'])
        ->first();

        if($user != null) {
            return back()->with(['error' => 'Phone number already exite in your database']);
        } 

        SMSHelper::sms($request['code'].$request['phone_number']);
        $user = User::create([
            'name' => $request['name'],
            'phone_number' => $request['code'].$request['phone_number'] ,
            'password' => Hash::make($request['password']),
        ]);
       
        return redirect()->route('verify')->with(['phone_number' => $request['code'].$request['phone_number']]);

       
    }

    protected function createCompany(Request $request)
    {


        $this->validator($request->all())->validate();

        $this->validator($request->all())->validate();
        $user = DB::table('companies')
        ->where('phone_number','=',$request['code'].$request['phone_number'])
        ->first();

        if($user != null) {
            return back()->with(['message' => 'Phone number not exite in your database']);
        } 
        SMSHelper::sms($request['code'].$request['phone_number']);
        $user = Company::create([
            'companyname' => $request['companyname'],
            'name' => $request['name'],
            'phone_number' => $request['code'].$request['phone_number'],
            'password' => Hash::make($request['password']),
        ]);
       
        return redirect()->route('verify/company')->with(['phone_number' => $request['code'].$request['phone_number']]);
      
       
    }


    protected function verifyUser(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone_number' => ['required', 'string'],
        ]);
            
        $verification = SMSHelper::smsVerify(
            $request =([
                'verification_code' => $data['verification_code'],
                'phone_number' => $data['phone_number'],
        ]));
        
        if ($verification) {
            $user = tap(User::where('phone_number', $data['phone_number']))->update(['isVerified' => true]);
            /* Authenticate user */
            return redirect()->route('login')->with(['message' => 'Phone number verified']);
        }

        return back()->with(['phone_number' => $data['phone_number'], 'error' => 'Invalid verification code entered!']);
    }   

    protected function verifyCompany(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone_number' => ['required', 'string'],
        ]);


        $verification = SMSHelper::smsVerify(
            $request =([
                'verification_code' => $data['verification_code'],
                'phone_number' => $data['phone_number'],
            ]));

        if ($verification) {
            $user = tap(Company::where('phone_number', $data['phone_number']))->update(['isVerified' => true]);
            /* Authenticate user */
            return redirect()->route('login/company')->with(['message' => 'Phone number verified']);
        }

        return back()->with(['phone_number' => $data['phone_number'], 'error' => 'Invalid verification code entered!']);
    }



    protected function resetPasswordUser(Request $request)
    {

        $user = DB::table('users')
        ->where('phone_number','=',$request['code'].$request['phone_number'])
        ->first();

        if($user == null) {
            return back()->with(['error' => 'Phone number not exite in your database']);
        }  
        $data = $request->validate([
            'phone_number' => ['required', 'string'],
        ]);
        
        SMSHelper::sms( $request['code'].$request['phone_number']);
       
        return redirect()->route('password/reset')->with(['phone_number' => $request['code'].$request['phone_number']]);

    } 
    

    protected function verifyResetUser(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone_number' => ['required', 'string'],
        ]);

        /* Get credentials from .env */
        $verification = SMSHelper::smsVerify(
        $request =([
            'verification_code' => $data['verification_code'],
            'phone_number' => $data['phone_number'],
        ]));


        if ($verification) {
            return redirect()->route('comfirm')->with(['phone_number' => $data['phone_number']]);
        } 

        return back()->with(['phone_number' => $data['phone_number'], 'error' => 'Invalid verification code entered!']);
       

    } 

    protected function confirmUser(Request $request)
    {
        $data = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = tap(User::where('phone_number', $request['phone_number']))->update(['isVerified' => true]);
        Auth::login($user->first());
        $user = Auth::user();
        $user->password = bcrypt($request['password']);
        $user->save();
        Auth::logout();
        return redirect()->route('login')->with(['phone_number' => $request['phone_number']]);

    } 


    protected function resetPasswordCompany(Request $request)
    {

        $user = DB::table('companies')
        ->where('phone_number','=',$request['phone_number'])
        ->first();

        if($user == null) {
            return back()->with(['error' => 'Phone number not exite in your database']);
        }  

        $data = $request->validate([
            'phone_number' => ['required', 'string'],
        ]);
        

        SMSHelper::sms( $request['code'].$request['phone_number']);

       
        return redirect()->route('password/reset/company')->with(['phone_number' => $request['phone_number']]);

    } 

    protected function verifyResetCompany(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone_number' => ['required', 'string'],
        ]);

        
        $verification = SMSHelper::smsVerify(
        $request =([
                'verification_code' => $data['verification_code'],
                'phone_number' => $data['phone_number'],
        ]));

        if ($verification->valid) {
            return redirect()->route('comfirm/company')->with(['phone_number' => $request['phone_number']]);
        }

        return back()->with(['phone_number' => $data['phone_number'], 'error' => 'Invalid verification code entered!']);
       

    } 


    protected function confirmCompany(Request $request)
    {
        $data = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = tap(Company::where('phone_number', $request['phone_number']))->update(['isVerified' => true]);
        Auth::login($user->first());
        $user = Auth::user();
        $user->password = bcrypt($request['password']);
        $user->save();
        return redirect()->route('login')->with(['phone_number' => $request['phone_number']]);

    } 





}
