@extends('layouts.admin')

@section('title', 'Recruiter Management')

@section('header', 'Recruiter Managerment')

@section('content')
    <section class="tables pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
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
            <div class="card">
                <div class="table-responsive">                       
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Phone Number</th>
                                <th>Member Since</th>
                                <th>Public Job</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $count => $company)                                          
                                <tr>
                                    <th scope="row">{{ ++$count }}</th>
                                    <td><a href="{{url('/recruiterDetails',$company->id)}}">{{$company->name}}</a></td>
                                    <td>{{ $company->phone_number }}</td>
                                    <td>{{ Carbon\Carbon::parse($company->created_at)->diffForHumans()}}</td>
                                    <td>{{$cj}}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
