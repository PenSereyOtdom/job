<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Auth;

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
    protected function create(array $data)
    {
        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");

        $twilio = new Client($twilio_sid, $token);

        $twilio->verify->v2->services($twilio_verify_sid)
          ->verifications
          ->create($data['phone_number'], "sms");

        return User::create([
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect()->route('verify')->with(['phone_number' => $data['phone_number']]);
    }

    protected function verify(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone_number' => ['required', 'string'],
        ]);

        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");

        $twilio = new Client($twilio_sid, $token);

        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($data['verification_code'], array('to' => $data['phone_number']));

        if ($verification->valid) {
            $user = tap(User::where('phone_number', $data['phone_number']))->update(['isVerified' => true]);
            /* Authenticate user */
            Auth::login($user->first());
            return redirect()->route('user.home')->with(['message' => 'Phone number verified']);
        }
        return back()->with(['phone_number' => $data['phone_number'], 'error' => 'Invalid verification code entered!']);
    }

    protected function createAdmin(Request $request)
    {

        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");

        $twilio = new Client($twilio_sid, $token);

        $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($request['phone_number'], "sms");

        $this->validator($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'phone_number' => $request['phone_number'],
            'password' => Hash::make($request['password']),
        ]);
        if (Auth::guard('admin')->attempt(['phone_number' => $request->phone_number, 'password' => $request->password], $request->get('remember'))) {

            // return redirect()->intended('/admin');
            return redirect()->route('verify')->with(['phone_number' => $request['phone_number']]);

        }
    }

    protected function createCompany(Request $request)
    {

        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");

        $twilio = new Client($twilio_sid, $token);

        $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($request['phone_number'], "sms");

        $this->validator($request->all())->validate();
        $company = Company::create([
            'name' => $request['name'],
            'phone_number' => $request['phone_number'],
            'password' => Hash::make($request['password']),
        ]);
        if (Auth::guard('company')->attempt(['phone_number' => $request->phone_number, 'password' => $request->password], $request->get('remember'))) {

            // return redirect()->intended('/verify');
            return redirect()->route('verify')->with(['phone_number' => $request['phone_number']]);
        }
    }


}
