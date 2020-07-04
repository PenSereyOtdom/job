@extends('layouts.admin')

@section('title', '')

@section('header', 'Verify Request')

@section('content')
    <section class="tables pt-0">
        <div class="container">
            <div class="card">
                <div class="table-responsive">                       
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Package Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($approval as $count => $approvals)                                          
                                <tr>
                                    <th scope="row">{{ ++$count }}</th>
                                    <td><a href="{{url('/verifyPackge', $approvals->company_id)}}">{{$approvals->company_name}}</a></td>
                                    <td>{{$approvals->service_title}}</td>
                                    @if($approvals->approve == 0)
                                    <td>Not Verify Yet</td>
                                    @else
                                    <td>Verified</td>
                                    @endif
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
