@extends('layouts.admin')

@section('title', 'Home')

@section('header', 'Home')

@section('content')
    <div class="home container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card container py-3">
                            <h4 class="font-weight-bold">@lang('admin.candidate')</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="text-center px-4">
                                        <h1 class="text-bold">{{$count_cv}}</h1>
                                        <p>@lang('admin.usercrcv')</p>
                                        <select class="form-control">
                                            <option>@lang('admin.last30')</option>
                                            <option>@lang('admin.last7')</option>
                                            <option>@lang('admin.yesterday')</option>
                                            <option>@lang('admin.today')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 border-left">
                                    <div class="text-center px-4">
                                        <h1 class="text-bold">{{$count_applies}}</h1>
                                        <p>@lang('admin.userapplyjob')</p>
                                        <select class="form-control">
                                            <option>@lang('admin.last30')</option>
                                            <option>@lang('admin.last7')</option>
                                            <option>@lang('admin.yesterday')</option>
                                            <option>@lang('admin.today')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card container py-3">
                            <h4 class="font-weight-bold">@lang('admin.recruiter')</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="text-center px-4">
                                        <h1 class="text-bold">{{$count_company}}</h1>
                                        <p>@lang('admin.recruiter')</p>
                                        <select class="form-control">
                                            <option>@lang('admin.last30')</option>
                                            <option>@lang('admin.last7')</option>
                                            <option>@lang('admin.yesterday')</option>
                                            <option>@lang('admin.today')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 border-left">
                                    <div class="text-center px-4">
                                        <h1 class="text-bold">{{$count_jobpost}}</h1>
                                        <p>@lang('admin.jobpost')</p>
                                        <select class="form-control">
                                            <option>@lang('admin.last30')</option>
                                            <option>@lang('admin.last7')</option>
                                            <option>@lang('admin.yesterday')</option>
                                            <option>@lang('admin.today')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card pt-3">
                <div class="scrollbar scrollbar-primary">
                    <div class="container pl-5">
                    <div class="float-right"><a class="link" href="/packgeRequest">@lang('admin.verify')</a></div>
                        <h4 class="font-weight-bold">Notifications</h4>
                            <div class="force-overflow">
                                <ul>
                                    <li>
                                        <p class="mb-0"><i class="far fa-bell"></i> ABA has purchased a package service. <a href="#">Click to verify.</a></p>
                                        <p class="small text-secondary">20/June/2020 13:14</p>
                                    </li>
                                    <li>
                                        <p class="mb-0"><i class="far fa-bell"></i> ABA has purchased a package service. <a href="#">Click to verify.</a></p>
                                        <p class="small text-secondary">20/June/2020 13:14</p>
                                    </li>
                                    <li>
                                        <p class="mb-0"><i class="far fa-bell"></i> ABA has purchased a package service. <a href="#">Click to verify.</a></p>
                                        <p class="small text-secondary">20/June/2020 13:14</p>
                                    </li>
                                    <li>
                                        <p class="mb-0"><i class="far fa-bell"></i> ABA has purchased a package service. <a href="#">Click to verify.</a></p>
                                        <p class="small text-secondary">20/June/2020 13:14</p>
                                    </li>
                                    <li>
                                        <p class="mb-0"><i class="far fa-bell"></i> ABA has purchased a package service. <a href="#">Click to verify.</a></p>
                                        <p class="small text-secondary">20/June/2020 13:14</p>
                                    </li>
                                    <li>
                                        <p class="mb-0"><i class="far fa-bell"></i> ABA has purchased a package service. <a href="#">Click to verify.</a></p>
                                        <p class="small text-secondary">20/June/2020 13:14</p>
                                    </li>
                                    <li>
                                        <p class="mb-0"><i class="far fa-bell"></i> ABA has purchased a package service. <a href="#">Click to verify.</a></p>
                                        <p class="small text-secondary">20/June/2020 13:14</p>
                                    </li>
                                    <li>
                                        <p class="mb-0"><i class="far fa-bell"></i> ABA has purchased a package service. <a href="#">Click to verify.</a></p>
                                        <p class="small text-secondary">20/June/2020 13:14</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @forelse (auth()->guard('admin')->user()->unreadNotifications as $notification) 
            @if ($notification->type=='App\Notifications\CompanyBuyPlan')
                <a href="/packgeRequest">
                    <li class="dropdown-item">
                        @include('notifications.adminNotification')
                    </li>
                </a>
            @elseif ($notification->type=='App\Notifications\UserAppliedJob')
                <li class="dropdown-item">
                    @include('notifications.adminNotification')
                </li>
            @endif
            @empty
            <li class="text-center">No new notifications</li>
        @endforelse

@endsection