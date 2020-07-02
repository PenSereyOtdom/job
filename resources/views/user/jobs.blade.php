@extends('layouts.user')

@section('title', 'Jobs')

@section('content')
@include('layouts.navbar')
    <!-- Search and Filter -->
    @include('layouts.searchfilter')

    @if(!Auth::check())
        @include('layouts.signin')
    @endif
    <section class="job-section pb-5 mt-0">
        <div class="container">
            <div class="pt-5">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-job-tab" data-toggle="pill" href="#pills-job" role="tab" aria-controls="pills-job" aria-selected="true">Related Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-urgent-tab" data-toggle="pill" href="#pills-urgent" role="tab" aria-controls="pills-urgent" aria-selected="false">Urgent Jobs</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent"> 
                <div class="tab-pane fade show active" id="pills-job" role="tabpanel" aria-labelledby="pills-job-tab">
                    <div class="job-post border">
                        <div class="px-5">
                            <div class="py-5">
                            @if($count_jobs < 1)
                                <p class="mb-0 text-center">There is no Jobs now. Please get back again soon.</p>
                            @else
                                <?php $normal = 0; ?>  
                                @foreach($jobs as $job)
                                    @if($job->job_priority == "Normal")
                                        <?php $normal = 1; ?>     
                                        <div class="mb-4">
                                            <h3 class="mr-3"><a class="link" href="{{url('/jobDetail' ,$job->id)}}">{{$job->job_title}}</a></h3>
                                            <p class="small">{{$job->name}}</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-4"><p class="text-secondary small mb-0">Job Type</p> <p>{{$job->job_type}}</p></div>
                                            <div class="col-4"><p class="text-secondary small mb-0">Location</p> <p>{{$job->location}}</p></div>
                                            <div class="col-4"><p class="text-secondary small mb-0">Salary/Month</p> <p>{{$job->salary}}</p></div>
                                        </div>
                                        
                                        <div class="d-flex">
                                            <p class="text-secondary small my-auto">Post {{ Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</p>
                                            <div class="p-2 ml-auto">
                                                <a class="link" href="{{url('/jobDetail' ,$job->id)}}"><i class="fa fa-star-o"></i> Save Job</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @if($normal == 0)
                                    <p class="mb-0 text-center">There is no Jobs now. Please get back again soon.</p>
                                @endif
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-urgent" role="tabpanel" aria-labelledby="pills-urgent-tab">
                    <div class="job-post border">
                        <div class="px-5">
                            <div class="py-5">
                            @if($count_jobs < 1)
                                <p class="mb-0 text-center">There is no Jobs now. Please get back again soon.</p>
                            @else
                            <?php $var = 0; ?>     
                                @foreach($jobs as $job)
                                    @if($job->job_priority == "Urgent")
                                        <?php $hotjob = 1; ?>     
                                        <div class="mb-4">
                                            <h3 class="mr-3"><a class="link" href="{{url('/jobDetail' ,$job->id)}}">{{$job->job_title}}</a></h3>
                                            <p class="small">{{$job->name}}</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-4"><p class="text-secondary small mb-0">Job Type</p> <p>{{$job->job_type}}</p></div>
                                            <div class="col-4"><p class="text-secondary small mb-0">Location</p> <p>{{$job->location}}</p></div>
                                            <div class="col-4"><p class="text-secondary small mb-0">Salary/Month</p> <p>{{$job->salary}}</p></div>
                                        </div>
                                        
                                        <div class="d-flex">
                                            <p class="text-secondary small my-auto">Post {{ Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</p>
                                            <div class="p-2 ml-auto">
                                                <a class="link" href="{{url('/jobDetail' ,$job->id)}}"><i class="fa fa-star-o"></i> Save Job</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @if($var == 1)
                                    <p class="mb-0 text-center">There is no Jobs now. Please get back again soon.</p>
                                @endif 
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="pagination justify-content-center mt-5">
            <li class="page-item">{{ $jobs->links() }}</li>
        </ul>
    </section>
@endsection