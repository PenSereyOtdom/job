@extends('layouts.admin')

@section('title', 'Recruiter Management')

@section('content')
    <div class="container">
        <div class="profile card mb-5">
            @foreach ($companies as $company)
                <div class="container p-5">
                    <div class="row">
                        <div class="col-lg-2"> 
                            @if($company->company_profile)
                                <img class="card-img-top profile-pic img-thumbnail" src="{{ asset('/storage/company_profile/' . $company->company_profile) }}"/>
                            @else
                                <img class="card-img-top profile-pic img-thumbnail" src="{{asset('/img/user_company.jpg')}}"/>
                            @endif
                        </div>
                        <div class="col-lg-4 my-auto">
                        <h4 class="font-weight-bold p-2">User Information</h4>
                            <div class="row">
                                <div class="col-lg-5">
                                    <p class="small p-2">Company Name:</p>
                                    <p class="small p-2">Phone Number:</p>
                                </div>
                                <div class="col-lg-7">
                                    <p class="small p-2">{{ $company->name }}</p>                        
                                    <p class="small p-2">{{ $company->phone_number}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <section class="tables pt-0">
        <div class="container">
            <div class="card">
                <div class="table-responsive">                       
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Job Title</th>
                                <th>Posted Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobpost as $count => $jobposts)                                          
                                <tr>
                                    <th scope="row">{{ ++$count }}</th>
                                    <td>{{$jobposts->job_title}}</td>
                                    <td>{{ Carbon\Carbon::parse($jobposts->created_at)->diffForHumans()}}</td>
                                </tr>
                            @endforeach                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
