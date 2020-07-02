@extends('layouts.auth')

@section('title', 'Verify')

@section('content')

<div class="d-flex justify-content-center align-items-center login-container">
    <div class="login border p-3">
        <div class="text-center logo my-3"><a href="/"><img src="{{asset('img/jobnow_logo.svg')}}" alt="Job Now Logo"></a></div>
        <h3 class="text-center font-weight-bold">Activate Your Account</h3>
        <div class="card-body">
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>
            @endif
            <p>The verification code was sent to your phone number: {{session('phone_number')}}</p>
            <p>Please enter the code.</p>
            <form action="{{route('verify')}}" method="post">
                @csrf
                <div class="form-group">
                    <input id="verification_code" type="tel" class="form-control{{ $errors->has('verification_code') ? ' is-invalid' : '' }}" name="verification_code" value="{{ old('verification_code') }}" required>
                    @if ($errors->has('verification_code'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary w-100">Verify Phnone Number</button>
            </form>
        </div>
    </div>
</div>

@endsection

