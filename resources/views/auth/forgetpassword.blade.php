@extends('layouts.auth')

@section('title', 'Forgetpassword')

@section('content')

<div class="d-flex justify-content-center align-items-center login-container">
    <div class="login border p-3">
        <div class="text-center logo my-3"><a href="/"><img src="{{asset('img/jobnow_logo.svg')}}" alt="Job Now Logo"></a></div>
        <div class="card-body">
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>
        @endif
            @isset($url)
                <form method="POST" action="{{route('forgetpassword/$url')}}" class="form-validate">
            @else
                <form action="{{route('forgetpassword')}}" method="post">
            @endisset
                @csrf
                <div class="form-group">
                    <div class="tab-content" id="pills-tabContent"> 
                        <div class="tab-pane fade show active" id="pills-phone-number" role="tabpanel" aria-labelledby="pills-phone-number-tab">
                            <div class="input-group">    
                                <div class="input-group-append">
                                <select name="code" class="input-group-text">
	                                <option value="+855" selected>+855</option>
                                </select>
                                </div>
                                <input  maxlength = "9" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="phone_number" type="number" placeholder="12345678" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" required>
                            </div>
                        </div>
                    </div>  
                </div>  
                <button type="submit" class="btn btn-primary w-100">Reset password</button>
            </form>
        </div>
    </div>
</div>

@endsection


