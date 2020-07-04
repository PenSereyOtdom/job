@extends('layouts.companies')

@section('title', 'Job Management')

@section('header', 'Job Management')

@section('content')

<div class="container">

    @if(count($jobPost) > '0')
    <div class="card mt-5">
        <table class="table mb-0">
            <thead>
                <tr>
                <th scope="col"><input type="text" class="form-control" name="search" placeholder="Search term..."></th>
                <th colspan="2">
                    <select class="form-control">
                        <option>@lang('company.all')</option>
                        <option>@lang('company.active')</option>
                        <option>@lang('company.inactive')</option>
                        <option>@lang('company.draft')</option>
                    </select>
                </th>
                </tr>
                <tr>
                <th scope="col">@lang('company.jobtitle')</th>
                <th scope="col">@lang('company.jobtype')</th>
                <th scope="col">@lang('company.salary')</th>
                <th scope="col">@lang('company.location')</th>
                <th scope="col">@lang('company.publishdate')</th>
                <th scope="col">@lang('company.status')</th>
                <th scope="col">@lang('company.action')</th>
                </tr>
            </thead>

            @foreach($jobPost as $job)
            <tbody>
                <tr>
                <th scope="row"><a class="uk-link-heading" href="{{url('/jobPost/jobDetail' ,$job->id)}}">{{$job->job_title}}</a></th>
                <td>{{$job->job_type}}</td>
                <td>{{$job->salary}}</td>
                <td>{{$job->location}}</td>
                <td>{{$job->closing_date}}</td>
                <td>{{$job->status}}</td>
                <td class="row py-0">
                    <form>
                        <button class="btn btn-link" name="status" value="Draft" type="hidden" type="submit"><i class="far fa-paper-plane"></i></button>
                    </form>
                    <form action="{{action('Companies\JobPostController@edit', $job->id)}}" method="post">
                        {{csrf_field()}}
                        <button class="btn btn-link" type="submit"><i type="submit" class="fas fa-edit"></i></button>
                    </form>

                    <button class="btn btn-link" type="button" data-toggle="modal" data-target="#deleteModal" data-placement="top" title="Delete CV"><i class="fa fa-trash"></i></button>
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="border border-0 modal-content bg-danger">
                                <div class="modal-header justify-content-center">
                                    <i class="fa fa-trash fa-3x" style="color:white;"></i>
                                </div>
                                <div class="modal-body text-center bg-white">
                                    <p>@lang('company.deletecv')</p>
                                    <small><i class="fa fa-exclamation-circle" aria-hidden="true"></i> @lang('company.ifyoudelete')</small>
                                    <form action="{{action('Companies\JobPostController@destroy', $job->id)}}" method="post" class="mt-3">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-primary">@lang('company.delete')</button>
                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">@lang('company.cancel')</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    @endif
</div>
@endsection