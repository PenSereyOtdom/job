@extends('layouts.companies')

@section('title', 'Home')

@section('header', 'Home')

@section('content')

<div class="home-company container">
<h4 class="font-weight-bold mb-4">My Dashboard</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card container py-3">
                <div class="row">
                    <div class="col-md-3 border-bottom">
                        <div class="text-center px-4 pt-2">
                            <div class="row">
                                <div class="col-lg-4 my-auto">
                                    <i class="fas fa-paper-plane bg-blue"></i>
                                </div>
                                <div class="col-lg-8">
                                    <h1 class="text-bold">{{$count_jobpost}}</h1>
                                    <p>Posted Jobs</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 border-left border-bottom">
                        <div class="text-center px-4 pt-2">
                            <div class="row">
                                <div class="col-lg-4 my-auto">
                                    <i class="fas fa-check bg-pink"></i>
                                </div>
                                <div class="col-lg-8">
                                    <h1 class="text-bold">{{$count_active_job}}</h1>
                                    <p>Active Jobs</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 border-left border-bottom">
                        <div class="text-center px-4 pt-2">
                            <div class="row">
                                <div class="col-lg-4 my-auto">
                                    <i class="fas fa-times bg-red"></i>
                                </div>
                                <div class="col-lg-8">
                                    <h1 class="text-bold">99</h1>
                                    <p>Inactive Jobs</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 border-left border-bottom">
                        <div class="text-center px-4 pt-2">
                            <div class="row">
                                <div class="col-lg-4 my-auto">
                                    <i class="far fa-folder-open bg-green"></i>
                                </div>
                                <div class="col-lg-8">
                                    <h1 class="text-bold">{{$count_draft_job}}</h1>
                                    <p>Draft Jobs</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row pt-3">
                    <div class="col-md-3 border-bottom">
                        <div class="text-center px-4 pt-2">
                            <div class="row">
                                <div class="col-lg-4 my-auto">
                                    <i class="far fa-calendar-check bg-yellow"></i>
                                </div>
                                <div class="col-lg-8">
                                    <h1 class="text-bold">{{$count_applied_candidate}}</h1>
                                    <p>Applied Candidates</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 border-left border-bottom">
                        <div class="text-center px-4 pt-2">
                            <div class="row">
                                <div class="col-lg-4 my-auto">
                                    <i class="fas fa-users bg-orange"></i>
                                </div>
                                <div class="col-lg-8">
                                    <h1 class="text-bold">{{$count_average_candidate}}</h1>
                                    <p>Average Candidate</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <h4 class="font-weight-bold mb-4">Your Package Information</h4>
    @if(count($services) == 0)
        <div class="card py-3 px-5">
            <div class="row">
                <div class="col-lg-4">
                    <h5 class="font-weight-bold text-primary">Not Available any Packge </h4>
                    <p>Go Premium and enjoy the benefits of being Premium</p>
                    <a href="{{url('serviceListing' )}}" style="padding-right: 15px;padding-top: 15px">
                        <button class="btn btn-lg btn-primary">Buy now</button>
                    </a>
                </div>

            </div>
        </div>
    @endif
    @foreach($services as $service) 
        <div class="card py-3 px-5">
            <div class="row">
                <div class="col-lg-4">
                    <h5 class="font-weight-bold text-primary">{{$service->title}}</h4>
                    <p>Go Premium and enjoy the benefits of being Premium</p>
                </div>
                <div class="col-lg-4">

                    <div class="d-flex">
                        <div class="px-3 text-center border-right">
                            <p class="font-weight-bold">{{$service->posts}}</p>
                            @if($service->approve == 1) 
                                <p>Available</p>
                            @else
                                <p>Padding</p>
                            @endif  
                        </div>
                        <div class="px-3 text-center">
                            <p class="font-weight-bold">{{$service->numbers - $service->posts }}</p>
                            <p>Used</p>
                        </div>
                    </div>
                </div>

                @if($service->approve == 0)
                    <div class="col-lg-4">
                        <a href="{{url('contactUs')}}" style="padding-right: 15px;padding-top: 15px">
                            <button class="btn btn-lg btn-primary">Contact  Admin</button>
                        </a>
                    </div>
                @else
                    <div class="col-lg-4">
                        @if($service->posts > 0)
                            <a href="{{url('/create/jobPost', $service->id )}}" style="padding-right: 15px;padding-top: 15px">
                                <button class="btn btn-lg btn-primary">Create Job post</button>
                            </a>
                        @else 
                                <a href="{{url('serviceListing')}}" style="padding-right: 15px;padding-top: 15px">
                                    <button class="btn btn-lg btn-primary">Buy now</button>
                                </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>

@endsection