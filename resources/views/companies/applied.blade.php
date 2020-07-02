@extends('layouts.companies')

@section('title', 'Applied Candidates')

@section('header', 'Applied Candidates')

@section('content')
    <section class="tables pt-0">
        <div class="container">
            <div class="card">
                <div class="table-responsive">                       
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th colspan="2"><input type="text" class="form-control w-50" name="search" placeholder="Search"></th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>@lang('admin.username')</th>
                                <th>@lang('admin.jobtitle')</th>
                                <th>@lang('admin.apply')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applies_table as $count => $apply)                                          
                                <tr>
                                    <th scope="row">{{ ++$count }}</th>
                                    <td><a class="link" href="{{url('/userDetail',$apply->user_id)}}">{{$apply->username}}</a></td>
                                    <td>{{ $apply->job_title }}</td>
                                    <td>{{ Carbon\Carbon::parse($apply->created_at)->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection