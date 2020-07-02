@extends('layouts.admin')

@section('title', 'Candidate Management')

@section('header', 'Candidate Management')

@section('content')
    <section class="tables pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card container py-3">
                        <h4 class="font-weight-bold">@lang('admin.candidate')</h4>
                        <div class="row">
                            <div class="col-6">
                                <div class="text-center px-4">
                                    <h1 class="text-bold">30</h1>
                                    <p>@lang('admin.usercrcv')</p>
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
                                    <p>@lang('admin.userapplyjob')</p>
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
                                <th>@lang('admin.user')</th>
                                <th>@lang('admin.membersince')</th>
                                <th>@lang('admin.noapplyjob')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $count => $users)                                          
                                <tr>
                                    <th scope="row">{{ ++$count }}</th>
                                    <td><a href="{{url('/candidateDetails',$users->id)}}">{{$users->name}}</a></td>
                                    <td>{{ Carbon\Carbon::parse($users->created_at)->diffForHumans()}}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
