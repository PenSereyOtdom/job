@extends('layouts.companies')

@section('title', 'Home')

@section('header', 'Home')

@section('content')

<div class="home container">
    <div class="row">
        <div class="col-lg-3">
            <div class="card text-center p-3">
                <div class="row">
                    <div class="col-lg-4 my-auto">
                        <i class="fas fa-paper-plane fa-2x"></i>
                    </div>
                    <div class="col-lg-8 my-auto">
                        <h1 class="text-bold">{{$count_jobpost}}</h1>
                        <p>@lang('company.postjob')</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-center p-3">
                <div class="row">
                    <div class="col-lg-4 my-auto">
                        <i class="fas fa-paper-plane fa-2x"></i>
                    </div>
                    <div class="col-lg-8 my-auto">
                        <h1 class="text-bold">{{$count_active_job}}</h1>
                        <p>@lang('company.activejob')</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-center p-3">
                <div class="row">
                    <div class="col-lg-4 my-auto">
                        <i class="fas fa-paper-plane fa-2x"></i>
                    </div>
                    <div class="col-lg-8 my-auto">
                        <h1 class="text-bold">3</h1>
                        <p>@lang('company.inactivejob')</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-center p-3">
                <div class="row">
                    <div class="col-lg-4 my-auto">
                        <i class="fas fa-paper-plane fa-2x"></i>
                    </div>
                    <div class="col-lg-8 my-auto">
                        <h1 class="text-bold">{{$count_draft_job}}</h1>
                        <p>@lang('company.draftjob')</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-center p-3">
                <div class="row">
                    <div class="col-lg-4 my-auto">
                        <i class="fas fa-paper-plane fa-2x"></i>
                    </div>
                    <div class="col-lg-8 my-auto">
                        <h1 class="text-bold">{{$count_applied_candidate}}</h1>
                        <p>@lang('company.applycanidate')</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-center p-3">
                <div class="row">
                    <div class="col-lg-4 my-auto">
                        <i class="fas fa-paper-plane fa-2x"></i>
                    </div>
                    <div class="col-lg-8 my-auto">
                        <h1 class="text-bold">6</h1>
                        <p>@lang('company.averagecandidate')</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-center p-3">
                <div class="row">
                    <div class="col-lg-4 my-auto">
                        <i class="fas fa-paper-plane fa-2x"></i>
                    </div>
                    <div class="col-lg-8 my-auto">
                        <h1 class="text-bold">12</h1>
                        <p>@lang('company.averageview')</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h4 class="font-weight-bold mb-4">@lang('company.yourpackinfo')</h4>
    @if(count($services) == 0)
    <div class="card py-3 px-5">
        <div class="row">
            <div class="col-lg-4">
                <h5 class="font-weight-bold text-primary">@lang('company.notavailablepack')</h4>
                <p>@lang('company.gopremium')</p>
                <a href="{{url('serviceListing' )}}" style="padding-right: 15px;padding-top: 15px">
                    <button class="btn btn-lg btn-primary">@lang('company.buynow')</button>
                </a>
            </div>
            </div>

        </div>
    </div>
    @endif
    @foreach($services as $service)
    <div class="card py-3 px-5">
        <div class="row">
            <div class="col-lg-4">
                <h5 class="font-weight-bold text-primary">{{$service->title}}</h4>
                <p>@lang('company.gopremium')</p>
            </div>
            <div class="col-lg-4">

                <div class="d-flex">
                    <div class="px-3 text-center border-right">
                        <p class="font-weight-bold">{{$service->posts}}</p>
                        @if($service->approve == 1) 
                            <p>@lang('company.available')</p>
                        @else
                            <p>@lang('company.padding')</p>
                        @endif  
                    </div>
                    <div class="px-3 text-center">
                        <p class="font-weight-bold">{{$service->numbers - $service->posts }}</p>
                        <p>@lang('company.used')</p>
                    </div>
                </div>
            </div>
            @if($service->approve == 0)
                <div class="col-lg-4">
                    <a href="{{url('contactUs')}}" style="padding-right: 15px;padding-top: 15px">
                        <button class="btn btn-lg btn-primary">@lang('company.contactadmin')</button>
                    </a>
                </div>
            @else
                <div class="col-lg-4">
                    @if($service->posts > 0)
                        <a href="{{url('/create/jobPost', $service->id )}}" style="padding-right: 15px;padding-top: 15px">
                            <button class="btn btn-lg btn-primary">@lang('company.createjobpost')</button>
                        </a>
                    @else 
                            <a href="{{url('serviceListing')}}" style="padding-right: 15px;padding-top: 15px">
                                <button class="btn btn-lg btn-primary">@lang('company.buynow')</button>
                            </a>
                    @endif
                </div>
            @endif
        </div>
    </div>

    @endforeach
</div>

@endsection