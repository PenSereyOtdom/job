@extends('layouts.auth')

@section('title', 'Register')

@section('content')

<div class="d-flex justify-content-center align-items-center login-container">
    <div class="login border p-3">
        <div class="text-center logo my-3"><a href="/"><img src="{{asset('img/jobnow_logo.svg')}}" alt="Job Now Logo"></a></div>
        <h3 class="text-center font-weight-bold">{{ isset($url) ? ucwords($url) : ""}} {{ __('Register') }}</h3>
        @isset($url)
        <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}" class="form-validate">
        @else
        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" class="form-validate">
        @endisset
        @csrf
        <form class="text-center">
            <!-- Username -->
            <div class="form-group">
                <label for="name">Username</label>
                <input maxlength = "15"  id="name" type="text" placeholder="Enter Username" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <!-- Phone Number -->
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <div class="input-group">    
                    <div class="input-group-append">
                        <select name="code" class="input-group-text">
	                        <option value="+855" selected>+855</option>
                        </select>
                    </div>
                    <input  maxlength = "9" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="phone_number" type="number" placeholder="12345678" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" required>

                    @if ($errors->has('phone_number'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                    @endif
                </div>
                @if ($errors->has('phone_number'))
                    <span class="invalid-feedback" role="alert">
                    </span>
                @endif
            </div>
            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
            </div>
            <!-- Register Button -->
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        <div class="d-flex mt-3">   
            @isset($url)
                @if($url=="company")
                <p class="small">Already has an account? <a href="{{ url('login/company') }}">Sign In</a></p>
                <div class="small ml-auto"><a href="{{ route('register')}}" class="small">Are you a job seeker?</a></div>
                @endif
                @else
                <p class="small">Already has an account? <a href="{{ route('login') }}">Sign In</a></p>
                <div class="ml-auto"><a href="{{ url('register/company')}}" class="small">Are you an employer?</a></div>
            @endisset
        </div>
    </div>
</div>

@endsection


