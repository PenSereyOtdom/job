@extends('layouts.admin')

@section('title', 'Candidate Management')

@section('content')
    <div class="container">
        <div class="profile card mb-5">

            @foreach ($users as $user)
                <div class="container p-5">
                    <div class="float-right">
                        <a href="{{action('Admin\CandidateManagermentController@pdf', $user->id)}}" data-toggle="tooltip" data-placement="top" title="Download CV" ><i class="fas fa-download pt-1"></i></a>
                    </div>
                    <div class="row">
                        <div class="col-lg-2"> 
                            @if($user->user_profile)
                                <img class="card-img-top profile-pic img-thumbnail" src="{{ asset('/storage/user_profile/' . $user->user_profile) }}"/>
                            @else
                                <img class="card-img-top profile-pic img-thumbnail" src="{{asset('/img/user_male.png')}}"/>
                            @endif
                        </div>
                        <div class="col-lg-4 my-auto">
                        <h4 class="font-weight-bold p-2">User Information</h4>
                            <div class="row">
                                <div class="col-lg-5">
                                    <p class="small p-2">Username:</p>
                                    <p class="small p-2">Phone Number:</p>
                                </div>
                                <div class="col-lg-7">
                                    <p class="small p-2">{{ $user->name }}</p>                        
                                    <p class="small p-2">{{ $user->phone_number}}</p>
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
                                <th>Appied Date</th>
                                <th>Company</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($candidate_had_applied as $count => $apply)                                          
                                <th scope="row">{{ ++$count }}</th>
                                <td>{{$apply->job_title}}</td>
                                <td>{{ Carbon\Carbon::parse($apply->created_at)->diffForHumans()}}</td>
                            @endforeach
                            @foreach($companies as $count => $company)                                          
                                <td>{{$company->name}}</td>
                            @endforeach  
                            </tr>                              
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
