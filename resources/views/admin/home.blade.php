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
                            <h4 class="font-weight-bold">Candidate Statistics</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="text-center px-4">
                                        <h1 class="text-bold">{{$count_cv}}</h1>
                                        <p>User Created CV</p>
                                        <select class="form-control">
                                            <option>Last 30 Days</option>
                                            <option>Last 7 Days</option>
                                            <option>Yesterday</option>
                                            <option>Today</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 border-left">
                                    <div class="text-center px-4">
                                        <h1 class="text-bold">{{$count_applies}}</h1>
                                        <p>User Applied Jobs</p>
                                        <select class="form-control">
                                            <option>Last 30 Days</option>
                                            <option>Last 7 Days</option>
                                            <option>Yesterday</option>
                                            <option>Today</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card container py-3">
                            <h4 class="font-weight-bold">Recruiter Statistics</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="text-center px-4">
                                        <h1 class="text-bold">{{$count_company}}</h1>
                                        <p>Recruiter Registered</p>
                                        <select class="form-control">
                                            <option>Last 30 Days</option>
                                            <option>Last 7 Days</option>
                                            <option>Yesterday</option>
                                            <option>Today</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 border-left">
                                    <div class="text-center px-4">
                                        <h1 class="text-bold">{{$count_jobpost}}</h1>
                                        <p>Jobs Posted</p>
                                        <select class="form-control">
                                            <option>Last 30 Days</option>
                                            <option>Last 7 Days</option>
                                            <option>Yesterday</option>
                                            <option>Today</option>
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
                    <div class="float-right"><a class="link" href="/packgeRequest">Verify Package</a></div>
                        <h4 class="font-weight-bold">Notifications</h4>
                            <div class="force-overflow">
                                <ul>

                                @forelse (auth()->guard('admin')->user()->unreadNotifications as $notification) 
                                    @if ($notification->type=='App\Notifications\CompanyBuyPlan')  
                                        <li class="dropdown-item">
                                            <a href="/packgeRequest">
                                                @include('notifications.adminNotification')
                                            </a>
                                        </li>
                                    @elseif ($notification->type=='App\Notifications\UserAppliedJob')
                                        <li class="dropdown-item">
                                            @include('notifications.adminNotification')
                                        </li>
                                    @endif
                                    @empty
                                    <li class="text-center">No new notifications</li>
                                @endforelse

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