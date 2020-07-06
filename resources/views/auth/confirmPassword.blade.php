@extends('layouts.auth')

@section('title', 'Register')

@section('content')

<div class="d-flex justify-content-center align-items-center login-container">
    <div class="login border p-3">
        <div class="text-center logo my-3"><a href="/"><img src="{{asset('img/jobnow_logo.svg')}}" alt="Job Now Logo"></a></div>
        @isset($url)
          <form method="POST" action="{{ route('comfirm/company') }}" aria-label="{{ __('Confirm Password') }}" class="form-validate">
        @else
          <form method="POST" action="{{ route('comfirm') }}" aria-label="{{ __('Confirm Password') }}" class="form-validate">
        @endisset

        @csrf
            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="hidden" name="phone_number" value="{{session('phone_number')}}">
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
            <button type="submit" class="btn btn-primary w-100">Confirm</button>
        </form>
    </div>
</div>

@endsection