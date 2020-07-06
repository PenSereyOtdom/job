@extends('layouts.admin')

@section('title', 'Setting')

@section('header', 'Setting')

@section('content')
  
    <!-- Administrator Information -->
    <div class="container">
        <div class="profile card mb-5">
            @foreach ($admin as $admins)
                <div class="container p-5">
                    <div class="row">
                        <div class="col-lg-3"> 
                            <div class="picture-container">
                                <div class="picture">       
                                    @if($admins->admin_profile)
                                        <img class="card-img-top" src="{{ asset('/storage/admin_profile/' . $admins->admin_profile) }}"/>
                                    @else
                                        <img class="card-img-top" src="{{asset('/img/user_company.jpg')}}"/>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 my-auto">
                        <h4 class="font-weight-bold">Administrator Information</h4>
                            <div class="row">
                                <div class="col-lg-3">
                                    <p class="small p-2">Username:</p>
                                    <p class="small p-2">Phone Number:</p>
                                </div>
                                <div class="col-lg-9">
                                    <p class="small p-2">{{ $admins->name }}</p>                        
                                    <p class="small p-2">{{ $admins->phone_number}}</p>
                                </div>
                            </div>
                            <form action="{{action('Admin\AdminSettingController@edit', $admins->id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <button class="btn btn-primary w-25">Edit Profile</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Master Data -->
    <div class="container">
        <div class="profile card mb-5">
            <div class="container px-5 py-4">
                <h3 class="font-weight-bold mb-3">Master Data</h3>
                @if ($count_master < 1)
                    <div class="text-center p-5">
                        <a type="button" class="btn btn-primary" href="{{url('create/master')}}">Create Master Data</a>
                    </div>
                @elseif ($count_master == 1)
                    @foreach($display_master as $master)
                        <h6 class="font-weight-bold">Job Classification</h6>
                        @foreach ($display_jobClassification as $jobClassification)
                            @if(isset($jobClassification->job_classification))
                                <p class="pl-3 small">{{$jobClassification->job_classification}}</p>
                            @endif
                        @endforeach

                        <h6 class="font-weight-bold">Qualification</h6>
                        @foreach ($display_qualification as $qualifications)
                            @if(isset($qualifications->qualification))
                                <p class="pl-3 small">{{$qualifications->qualification}}</p>
                            @endif
                        @endforeach

                        <h6 class="font-weight-bold">Job Type</h6>
                        @foreach ($display_jobType as $jobType)
                            @if(isset($jobType->job_type))
                                <p class="pl-3 small">{{$jobType->job_type}}</p>
                            @endif
                        @endforeach

                        <h6 class="font-weight-bold">Salary Range</h6>
                        @foreach ($display_salary as $salary)
                            @if(isset($salary->salary_range))
                                <p class="pl-3 small">{{$salary->salary_range}}</p>
                            @endif
                        @endforeach
                        
                        <h6 class="font-weight-bold">Experience Level</h6>
                        @foreach ($display_experienceLevel as $experienceLevel)
                            @if(isset($experienceLevel->experience_level))
                                <p class="pl-3 small">{{$experienceLevel->experience_level}}</p>
                            @endif
                        @endforeach

                        <h6 class="font-weight-bold">Job Industry</h6>
                        @foreach ($display_businessIndustry as $businessIndustry)
                            @if(isset($businessIndustry->business_industry))
                                <p class="pl-3 small">{{$businessIndustry->business_industry}}</p>
                            @endif
                        @endforeach
                        <div class="card-close d-flex">
                            <form action="{{action('Admin\MasterDataController@edit', $master->id)}}" method="post">
                                {{csrf_field()}}
                                <button class="btn btn-link" type="submit" data-toggle="tooltip" data-placement="top" title="Edit Master"><i type="submit" class="fa fa-edit"></i></button>
                            </form>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- Change password -->
    <div class="container">
        <div class="card mb-5">
            <div class="container p-5">
                <div class="d-flex align-items-center">
                    <div class="col-12">
                        <div class="panel panel-default">
                            <h4 class="font-weight-bold">Change password</h4><br>
                            <div class="panel-body">
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
                                <form class="form-horizontal" method="POST" action="{{ route('settingTesting') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                        <label for="current-password" class="col-md-4 control-label">Current Password</label>
                                        <div class="col-lg-6 col-12">
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
                                        <div class="col-lg-6 col-12">
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
                                        <div class="col-lg-6 col-12">
                                            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-6 col-12">
                                            <button type="submit" class="btn btn-primary">
                                                Change Password
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>                   
            </div>
        </div>
    </div>

@endsection
