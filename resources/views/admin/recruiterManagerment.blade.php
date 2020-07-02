@extends('layouts.admin')

@section('title', 'Recruiter Management')

@section('header', 'Recruiter Managerment')

@section('content')
    <section class="tables pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card container py-3">
                        <h4 class="font-weight-bold">@lang('admin.recruiter')</h4>
                        <div class="row">
                            <div class="col-6">
                                <div class="text-center px-4">
                                    <h1 class="text-bold">30</h1>
                                    <p>@lang('admin.recruiter')</p>
                                    <select class="form-control">
                                        <option>@lang('admin.last30')</option>
                                        <option>@lang('admin.last7')</option>
                                        <option>@lang('admin.yesterday')</option>
                                        <option>@lang('admin.today')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 border-left">
                                <div class="text-center px-4">
                                    <h1 class="text-bold">120</h1>
                                    <p>@lang('admin.jobpost')</p>
                                    <select class="form-control">
                                        <option>@lang('admin.last30')</option>
                                        <option>@lang('admin.last7')</option>
                                        <option>@lang('admin.yesterday')</option>
                                        <option>@lang('admin.today')</option>
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
                                <th>@lang('admin.comname')</th>
                                <th>@lang('admin.phone')</th>
                                <th>@lang('admin.membersince')</th>
                                <th>@lang('admin.publicjob')</th>
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
