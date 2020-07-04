@extends('layouts.admin')

@section('title', 'Candidate Management')

@section('header', 'Candidate Management')

@section('content')
    <section class="tables pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
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
            </div>
            <div class="card">
                <div class="table-responsive">                       
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Member Since</th>
                                <th>No. of applieds Jobs</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $count => $users)                                          
                                <tr>
                                    <th scope="row">{{ ++$count }}</th>
                                    <td><a href="{{url('/candidateDetails',$users->id)}}">{{$users->name}}</a></td>
                                    <td>{{ Carbon\Carbon::parse($users->created_at)->diffForHumans()}}</td>
                                    <td>10000</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
