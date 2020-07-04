@extends('layouts.auth')

@section('title', 'Sign In')

@section('content')

        @isset($url)
        <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <img src="/img/login.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="brand-wrapper text-center">
                                <img src="img/jobnow_logo.svg" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description text-center">Sign into your account</p>
                            <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}" class="form-validate">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                </div>
                                <a href="#!" class="forgot-password-link">Forgot password?</a>
                                <div class="form-check float-right">
                                    <input class="form-check-input" type="checkbox" name="remember">
                                    <label class="form-check-label forgot-password-link" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <input name="login" id="login" class="btn btn-primary mb-4 w-100" type="button" value="Sign In">
                            </form>
                            <p class="login-card-footer-text small">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
                            <nav class="login-card-footer-nav">
                                <a href="#!">Terms of use.</a>
                                <a href="#!">Privacy policy</a>
                            </nav>
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
<<<<<<< HEAD

            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="form-validate">
                @csrf
                <div class="form-group">
                    <label for="inputUsername" class="nav nav-pills mb-2" id="pills-tab" role="tablist"> 
                        <a class="pill-name mr-2 active" id="pills-username-tab" data-toggle="pill" href="#pills-username" role="tab" aria-controls="pills-username" aria-selected="true">@lang('home.username') </a> |
                        <a class="pill-name ml-2" id="pills-phone-number-tab" data-toggle="pill" href="#pills-phone-number" role="tab" aria-controls="pills-phone-number" aria-selected="false">@lang('home.phone')</a>
                    </label>
                    <div class="tab-content" id="pills-tabContent"> 
                        <div class="tab-pane fade show active" id="pills-username" role="tabpanel" aria-labelledby="pills-username-tab">
                            <input id="email" type="text" placeholder="Enter Username" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="tab-pane fade" id="pills-phone-number" role="tabpanel" aria-labelledby="pills-phone-number-tab">
                            <div class="input-group">    
                                <select name="code" class="input-group-text">
                                    <option value="+855" selected>+855</option>
                                </select>
                                <input type="tel" name="phone" placeholder="Please enter your phone number..." class="form-control">

                            </div>
                            <input type="tel" name="phone" placeholder="Please enter your phone number..." class="form-control">
                        </div>
                    </div>
                </div>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            @if (Route::has('password.request'))
                <p class="float-right mb-0"><a class="forgot-pass small" href="{{ route('password.request'}}">@lang('home.forgetpass')</a></p>

            @endif
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label small" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <button type="submit" class="btn btn-primary w-100">@lang('home.signin_menu')</button>
        </form>
        <div class="d-flex mt-3">
            @isset($url)
                @if($url=="company")
                <p class="small">@lang('home.notmember')</p><a href="{{ url('register/company')}}"> @lang('home.register')</a>
                <div class="ml-auto"><a href="{{ route('login')}}" class="small">@lang('home.jonseeker')</a></div>
                @endif
                @else
                <p class="small">@lang('home.notmember')<a href="{{ route('register', app()->getLocale()) }}"> @lang('home.register')</a></p>
                <div class="ml-auto"><a href="{{ url('login/company')}}" class="small">@lang('home.employer')</a></div>
            @endisset
        </div>
        @endisset
    </div>
</div>
@endsection

