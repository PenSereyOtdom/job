@extends('layouts.admin')

@section('title', 'Career Advise')

@section('header', 'Career Advise')

@section('content')    
    <div class="container">
        <a href=" {{url('/create/career')}} ">
            <button class="btn btn-primary">@lang('admin.newpost')</button>
        </a>
    </div>

    @if(count($career) > '0')
    <div class="container mt-5">
        <div class="card">
            <div class="table-responsive">                       
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('admin.title')</th>
                            <th>@lang('admin.lastmodify')</th>
                            <th>@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($career as $careers)
                            <tr>
                                <th scope="row">{{++$count}}</th>
                                <td>{{$careers->title}}</a></td>
                                <td>{{ Carbon\Carbon::parse($company->created_at)->diffForHumans()}}</td>
                                <td class="row py-0">
                                    <button class="btn btn-link" name="status" value="Draft" type="hidden" type="submit"><i class="far fa-paper-plane"></i></button>
                                    <button class="btn btn-link" type="button"><i type="submit" class="fas fa-edit"></i></button>
                                    <button class="btn btn-link" type="button"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
@endsection
