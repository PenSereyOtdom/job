@extends('layouts.user')

@section('title', 'Applied Job')

@section('content')
@include('layouts.navbar')
<!-- Page Content -->
<div class="container">
    <!-- Profile Nav -->
    @include('layouts.profileNav')
    <!-- Profile Section -->
    <div class="profile mb-5">
    @if ($count_applied < 1)
        <div class="container text-center my-auto">
            <div class="job-post border">
                <div class="px-5">
                    <div class="py-5">
                        <p class="mb-0">You haven't applied to any job yet. Look for some jobs <a class="link"href="/jobs">here</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    @elseif ($count_applied >= 1)
        @foreach($appliedJobs as $job)
            <div class="job-post border">
                <div class="px-5">
                    <div class="py-4">
                        <div class="d-flex">
                            <h3 class="mr-3"><a class="link" href="{{url('/jobDetail' ,$job->id)}}">{{$job->job_title}}</a></h3>
                            <div class="ml-auto mr-3"><p class="font-weight-bold text-success"><i class="fa fa-check"></i> Applied</p></div>
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
                                <div class="p-2 ml-auto">
                                    <a class="link" href="{{url('/jobDetail' ,$job->id)}}"><i class="fa fa-trash"></i> Remove Job</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    </div>
</div>

@endsection