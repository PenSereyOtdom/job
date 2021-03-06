@extends('layouts.companies')

@section('title', 'Applied Candidates')

@section('header', 'User Detail')

@section('content')

<div class="profile card mb-5">
    <div class="container p-5">
    @foreach ($users as $user)
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                @if($user->user_profile)
                <img src="{{asset('storage/user_profile/' . $user->user_profile)}}" class="img-fluid rounded-circle">
                @else
                <img src="{{asset('/img/user_company.jpg')}}" class="img-fluid rounded-circle">
                @endif
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 my-auto">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <p class="small p-2">@lang('company.username')</p>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <p class="small p-2 font-weight-bold">{{ $user->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>

@foreach($userDetail as $cv)
    <div class="container">
        <div class="card p-5">
<<<<<<< HEAD
            <a href="{{action('Companies\UserDetailController@downloadPDF', $cv->id)}}" data-toggle="tooltip" data-placement="top" title="Download CV" ><i class="fas fa-download pt-1"></i></a>
            <h4 class="font-weight-bold">Candidate Information</h4>
=======
            <h4 class="font-weight-bold">@lang('company.candidateinfo')</h4>
>>>>>>> master
            <div class="form-group row mb-0">
                <label class="col-sm-3 form-control-label">@lang('company.fullname')</label>
                <div class="col-sm-9">
                    <p>{{$cv->full_name}}</p>
                </div>
            </div>

            <div class="form-group row mb-0">
                <label class="col-sm-3 form-control-label">@lang('company.email')</label>
                <div class="col-sm-9">
                    <p>{{$cv->email}}</p>
                </div>
            </div>
            
            <div class="form-group row mb-0">
                <label class="col-sm-3 form-control-label">@lang('company.contact')</label>
                <div class="col-sm-9">
                    <p>0{{$cv->phone_number}}</p>
                </div>
            </div>

            <div class="form-group row mb-0">
                <label class="col-sm-3 form-control-label">@lang('company.summary')</label>
                <div class="col-sm-9">
                    <p>{{$cv->summary}}</p>
                </div>
            </div>

            @if(count($display_education)<= 1)
                <h4 class="font-weight-bold">@lang('company.education')</h4>
            @endif
            @foreach ($display_education as $edu)
                @if(isset($edu->school_name))
                <div class="form-group row mb-0">
                    <label class="col-sm-3 form-control-label">@lang('company.schoolname')</label>
                    <div class="col-sm-9">
                        <p>{{$edu->school_name}}</p>
                    </div>
                </div>
                @endif
                @if(isset($edu->edu_start_date)&&isset($edu->edu_end_date))
                <div class="form-group row mb-0">
                    <label class="col-sm-3 form-control-label">@lang('company.date')</label>
                    <div class="col-sm-9">
                        <p>{{$edu->edu_start_date}} ~ {{$edu->edu_end_date}}</p>
                    </div>
                </div>
                @endif
                @if(isset($edu->major))
                <div class="form-group row mb-0">
                    <label class="col-sm-3 form-control-label">@lang('company.major')</label>
                    <div class="col-sm-9">
                        <p>{{$edu->major}}</p>
                    </div>
                </div>
                @endif
                @if(isset($edu->edu_detail))
                <div class="form-group row mb-0">
                    <label class="col-sm-3 form-control-label">@lang('company.educationdetail')</label>
                    <div class="col-sm-9">
                        <p>{{$edu->edu_detail}}</p>
                    </div>
                </div>
                @endif
            @endforeach
            
            @if(count($display_experience)<= 1)
                <h4 class="font-weight-bold">@lang('company.experience')</h4>
            @endif
            @foreach ($display_experience as $exp)
                @if(isset($exp->exp_workplace_name))
                <div class="form-group row mb-0">
                    <label class="col-sm-3 form-control-label">@lang('company.workplacename')</label>
                    <div class="col-sm-9">
                        <p>{{$exp->exp_workplace_name}}</p>
                    </div>
                </div>
                @endif
                @if(isset($exp->exp_title))
                <div class="form-group row mb-0">
                    <label class="col-sm-3 form-control-label">@lang('company.experiencetitle')</label>
                    <div class="col-sm-9">
                        <p>{{$exp->exp_title}}</p>
                    </div>
                </div>
                @endif
                @if(isset($exp->exp_start_date)&&isset($exp->exp_end_date))
                <div class="form-group row mb-0">
                    <label class="col-sm-3 form-control-label">Date</label>
                    <div class="col-sm-9">
                        <p>{{$exp->exp_start_date}} ~ {{$exp->exp_end_date}}</p>
                    </div>
                </div>
                @endif
                @if(isset($exp->exp_detail))
                <div class="form-group row mb-0">
                    <label class="col-sm-3 form-control-label">@lang('company.experiencedetail')</label>
                    <div class="col-sm-9">
                        <p>{{$exp->exp_detail}}</p>
                    </div>
                </div>
                @endif
            @endforeach

            @if(count($display_achievement)<= 1)
                <h4 class="font-weight-bold">@lang('company.achievement')</h4>
            @endif
            @foreach ($display_achievement as $ach)
                @if(isset($ach->ach_title))
                <div class="form-group row mb-0">
                    <label class="col-sm-3 form-control-label">@lang('company.achievementtitle')</label>
                    <div class="col-sm-9">
                        <p>{{$ach->ach_title}}</p>
                    </div>
                </div>
                @endif
                @if(isset($ach->ach_date))
                <div class="form-group row mb-0">
                    <label class="col-sm-3 form-control-label">@lang('company.date')</label>
                    <div class="col-sm-9">
                        <p>{{$ach->ach_date}}</p>
                    </div>
                </div>
                @endif
                @if(isset($ach->ach_detail))
                <div class="form-group row mb-0">
                    <label class="col-sm-3 form-control-label">@lang('company.achievementdetail')</label>
                    <div class="col-sm-9">
                        <p>{{$ach->ach_detail}}</p>
                    </div>
                </div>
                @endif
            @endforeach

            @if(count($display_language)<= 1)
                <h4 class="font-weight-bold">@lang('company.language')</h4>
            @endif

            @foreach ($display_language as $lang)

                @if(isset($lang->lang))
                <div class="form-group row mb-0">
                    <label class="col-sm-3 form-control-label">{{$lang->lang}}</label>
                    <div class="col-sm-9">
                        <p>{{$lang->level}}</p>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
@endforeach

@endsection