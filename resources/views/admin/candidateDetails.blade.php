@extends('layouts.admin')

@section('title', 'Candidate Details')

@section('content')
    <div class="container">
        <div class="profile card mb-5">
            @foreach ($users as $user)
                <div class="container p-5">
                    <div class="row">
                        <div class="col-lg-2"> 
                            @if($user->user_profile)
                                <img class="card-img-top profile-pic img-thumbnail" src="{{ asset('/storage/user_profile/' . $user->user_profile) }}"/>
                            @else
                                <img class="card-img-top profile-pic img-thumbnail" src="{{asset('/img/user_company.jpg')}}"/>
                            @endif
                        </div>
                        <div class="col-lg-4 my-auto">
                        <h4 class="font-weight-bold">@lang('admin.userinfo')</h4>
                            <div class="row">
                                <div class="col-lg-5">
                                    <p class="small p-2">@lang('admin.username')</p>
                                    <p class="small p-2">@lang('admin.phone')</p>
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
                                <th>@lang('admin.jobtitle')</th>
                                <th>@lang('admin.applydate')</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($candidate_had_applied as $count => $apply)                                          
                                <tr>
                                    <th scope="row">{{ ++$count }}</th>
                                    <td>{{$apply->job_title}}</td>
                                    <td>{{ Carbon\Carbon::parse($apply->created_at)->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                            @foreach($companies as $count => $company)                                          
                                <td>{{$company->name}}</td>
                            @endforeach                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
