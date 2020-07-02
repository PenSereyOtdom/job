@extends('layouts.companies')

@section('title', 'Setting')

@section('header', 'Company Information')

@section('content')
    <div class="container">
        <div class="profile card mb-5">
            @foreach ($company as $companies)
                <div class="container p-5">
                    <div class="row">
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row justify-content">
                                    <div class="col-3">
                                        <div class="picture-container">
                                            <div class="picture">
                                            @if($companies->company_profile)
                                                <img class="card-img-top" src="{{ asset('/storage/company_profile/' . $companies->company_profile) }}"/>
                                            @else
                                                <img class="card-img-top" src="{{asset('/img/user_company.jpg')}}"/>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <h3 class="font-weight-bold">Company Information</h3><hr>
                                        <div class="form-group row">
                                            <label class="col-sm-3 form-control-label">Company:</label>
                                            <div class="col-sm-9">
                                                <p>{{ $companies->name }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 form-control-label">Contact:</label>
                                            <div class="col-sm-9">
                                                <p>{{ $companies->phone_number }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 form-control-label">Address:</label>
                                            <div class="col-sm-9">
                                                <p>{{ $companies->address }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 form-control-label">City:</label>
                                            <div class="col-sm-9">
                                                <p>{{ $companies->city }}</p>
                                            </div>
                                        </div>

                                        <h3 class="font-weight-bold">Recruiter Information</h3><hr>

                                        <div class="form-group row">
                                            <label class="col-sm-3 form-control-label">Recruiter Name:</label>
                                            <div class="col-sm-9">
                                                <p>{{ $companies->recruiter_name}}</p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 form-control-label">Recruiter Position:</label>
                                            <div class="col-sm-9">
                                                <p>{{ $companies->recruiter_position }}</p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 form-control-label">Website:</label>
                                            <div class="col-sm-9">
                                                <p>{{ $companies->website}}</p>
                                            </div>
                                        </div>
                                        <form action="{{action('Companies\CompaniesSettingController@edit', $companies->id)}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <button class="btn btn-primary">Edit Information</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container mt-5">
        <div class="card mb-5">
            <div class="container p-5">
                <h3>Change password</h3><br>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('testing') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                        <label for="current-password" class="col-md-4 control-label">Current Password</label>

                        <div class="col-md-6">
                            <input id="current-password" type="password" class="form-control" name="current-password" required>

                            @if ($errors->has('current-password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('current-password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                        <label for="new-password" class="col-md-4 control-label">New Password</label>

                        <div class="col-md-6">
                            <input id="new-password" type="password" class="form-control" name="new-password" required>

                            @if ($errors->has('new-password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('new-password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>
                        <div class="col-md-6">
                            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Change Password
                            </button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
@endsection
