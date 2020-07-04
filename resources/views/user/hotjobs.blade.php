@extends('layouts.user')

@section('title', 'Hot Jobs')

@section('content')
@include('layouts.navbar')
    <!-- Search and Filter -->
    @include('layouts.searchfilter')
    
    @if(!Auth::check())
        @include('layouts.signin')
    @endif
    <section class="job-section pb-5 pt-0">
        <div class="container">
            <div class="pt-5">
                <ul class="nav nav-tabs">
                    <li class="nav-item text-center">
                    <a class="nav-link active" href="/hotJobs">Urgent Jobs</a>
                    </li>
                </ul>
            </div>
            @if($count_jobs < 1)
                <div class="job-post border">
                    <div class="px-5">
                        <div class="py-5">
                            <p class="mb-0 text-center">There is no Urgent Jobs now. Look for some normal jobs <a class="link"href="/jobs">here</a>.</p>
                        </div>
                    </div>
                </div>
            @else
                @foreach($jobs as $job)
                    @if($job->job_priority == "Urgent")
                    <div class="job-post border">
                        <div class="px-5">
                            <div class="py-4">
                                <div class="d-flex">
                                    <h3 class="mr-3"><a class="link" href="{{url('/jobDetail' ,$job->id)}}">{{$job->job_title}}</a></h3>
                                    <div class="ml-auto mr-3"><h5 class="font-weight-bold text-warning"><span class="badge badge-pill badge-warning">Urgent Job</span></h5></div>
                                </div>
                                <p class="small">{{$job->name}}</p>
                                <div class="row">
                                    <div class="col-4"><p class="text-secondary small mb-0">Job Type</p> <p>{{$job->job_type}}</p></div>
                                    <div class="col-4"><p class="text-secondary small mb-0">Location</p> <p>{{$job->location}}</p></div>
                                    <div class="col-4"><p class="text-secondary small mb-0">Salary/Month</p> <p>{{$job->salary}}</p></div>
                                </div>
                                
                                <div class="d-flex">
                                    <p class="text-secondary small my-auto">Post {{ Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</p>
                                    <div class="p-2 ml-auto">
                                        @if($count_jobs < 1)
                                            <p class="mb-0 text-center">There is no Jobs now. Please get back again soon.</p>
                                        @else
                                            <?php $savejob = 0; ?> 
                                            @foreach($saves as $save)
                                            @if($job->id == $save->job_post_id and $save->saved == 1 )
                                            <form action="{{url('save', $job->id)}}" method="POST">
                                                @csrf
                                                <input name="id" value="{{$job->id}}" type="hidden">
                                                <input name="saved" value="{{$save->saved ^ 1}}" type="hidden">
                                                <button class="btn btn-link" type="submit"><i class="fa fa-star"></i> Saved Job</button> 
                                            </form>
                                                <?php $savejob = 1;?> 
                                            @endif
                                            @endforeach
                                            @if($savejob == 0)
                                            <form action="{{url('save', $job->id)}}" method="POST">
                                                @csrf
                                                <input name="id" value="{{$job->id}}" type="hidden">
                                                <button class="btn btn-link" type="submit"><i class="fa fa-star-o"></i> Save Job</button> 
                                            </form>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>
        <ul class="pagination justify-content-center mt-5">
            <li class="page-item">{{ $jobs->links() }}</li>
        </ul>
    </section>
@endsection