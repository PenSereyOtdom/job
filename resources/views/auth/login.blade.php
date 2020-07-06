@extends('layouts.auth')

@section('title', 'Sign In')

@section('content')
        @isset($url)
        <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="login-card">
                <div class="row no-gutters">
                    <div class="col-md-6 img-login">
                        <div class="container login-center">
                            <div class="pl-5">
                                <a href="/"><img src="{{asset('img/jobnow_logo_white.svg')}}" alt="logo" class="logo" width="200px"></a>
                                <h5 class="text-white pt-3">Find the perfect candidate for your company.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 card">
                        <div class="card-body">
                            <h1 class="login-card-description text-center">Sign in</h1>
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}" class="form-validate">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="col-form-label text-md-left">{{ __('Username Or Phone Number') }}</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} form-control-lg" name="username" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-form-label text-md-left">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="float-right">
                                @if (Route::currentRouteName() == "forgetpassword/company")
                                    <a class="forgot-pass small float-right" href="{{ route('forgetpassword/company') }}">Forgot Your Password?</a>
                                @endif
                                </div>
                                <div class="form-check w-50">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div></br>

                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    {{ __('Login') }}
                                </button>
                            </form>
                            <div class="mt-5">
                            @isset($url)
                                @if($url=="company")
                                <p class="login-card-footer-text small">Don't have an account? <a href="{{url('register/company')}}">Register here</a></p>
                                @endif
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main>
        @else
            <div class="d-flex justify-content-center align-items-center login-container">
            <div class="login border p-3">
            <div class="text-center logo my-3"><a href="/"><img src="{{asset('img/jobnow_logo.svg')}}" alt="Job Now Logo"></a></div>
            <h3 class="text-center font-weight-bold">{{ isset($url) ? ucwords($url) : ""}} {{ __('Sign In') }}</h3>
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="form-validate">
                @csrf
                <div class="form-group">
                    <label for="inputUsername" class="nav nav-pills mb-2" id="pills-tab" role="tablist"> 
                        <a class="pill-name mr-2 active" id="pills-username-tab" data-toggle="pill" href="#pills-username" role="tab" aria-controls="pills-username" aria-selected="true">Username </a> |
                        <a class="pill-name ml-2" id="pills-phone-number-tab" data-toggle="pill" href="#pills-phone-number" role="tab" aria-controls="pills-phone-number" aria-selected="false">Phone Number</a>
                    </label>
                    <div class="tab-content" id="pills-tabContent"> 
                        <div class="tab-pane fade show active" id="pills-username" role="tabpanel" aria-labelledby="pills-username-tab">
                            <input type="text" placeholder="Enter Username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                        </div>
                        <div class="tab-pane fade" id="pills-phone-number" role="tabpanel" aria-labelledby="pills-phone-number-tab">
                            <div class="input-group">    
                                <select name="code" class="input-group-text">
                                    <option value="+855" selected>+855</option>
                                </select>
                                <input type="text" name="phone_number" placeholder="Please enter your phone number..." class="form-control">
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                
                @if (Route::has('forgetpassword'))
                    <a class="forgot-pass small float-right" href="{{ route('forgetpassword') }}">Forgot Your Password?</a>
                @endif
                <div class="form-check w-50">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label small" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Sign In</button>
            </form>
            <div class="d-flex mt-3">
                @isset($url)
                    @if($url=="company")
                    <p class="small">Not a member?</p><a href="{{ url('register/company')}}"> Register</a>
                    <div class="ml-auto"><a href="{{ route('login')}}" class="small">Are you a job seeker?</a></div>
                    @endif
                    @else
                    <p class="small">Not a member?<a href="{{ route('register') }}"> Register</a></p>
                    <div class="ml-auto"><a href="{{ url('login/company')}}" class="small">Are you an employer?</a></div>
                @endisset
            </div>
        @endisset
    </div>
</div>
@endsection