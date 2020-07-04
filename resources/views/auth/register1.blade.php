@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
        <div class="login-card">
            <div class="row no-gutters">
                <div class="col-md-6 img-login ">
                    <div class="container login-center">
                        <div class="pl-5">
                            <img src="img/jobnow_logo_white.svg" alt="logo" class="logo" width="200px">
                            <h5 class="text-white pt-3">Find the perfect candidate for your company.</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 card">
                    <div class="card-body py-5">
                        <h1 class="login-card-description text-center">Create an Account</h1>
                        <form class="">
                            <!-- Username -->
                            <div class="form-group">
                                <label for="name">Username</label>
                                <input id="name" type="text" placeholder="Enter Username" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
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
                                        <span class="input-group-text">+855</span>
                                    </div>
                                    <input id="phone_number" type="tel" placeholder="12 345 678" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" required>
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
                        <p class="login-card-footer-text small my-3">Already has an account? <a href="#">Sign In</a></p>
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
@endsection