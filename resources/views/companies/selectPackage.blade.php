@extends('layouts.companies')

@section('title', 'Job Management')

@section('header', 'Select Package')

@section('content')
<div class="container">
@if(count($selectPackage) == 0)
    <div class="card py-3 px-5">
        <div class="row">
            <div class="col-lg-4">
                <h5 class="font-weight-bold text-primary">Not Available any Packge </h4>
                <p>Go Premium and enjoy the benefits of being Premium</p>
                <a href="{{url('serviceListing' )}}" style="padding-right: 15px;padding-top: 15px">
                    <button class="btn btn-lg btn-primary">Buy now</button>
                </a>
            </div>

        </div>
    </div>
    @endif
    @foreach($selectPackage as $service) 
    <div class="card py-3 px-5">
        <div class="row">
            <div class="col-lg-4">
                <h5 class="font-weight-bold text-primary">{{$service->title}}</h4>
                <p>Go Premium and enjoy the benefits of being Premium</p>
            </div>
            <div class="col-lg-4">
                <div class="d-flex">
                    <div class="px-3 text-center border-right">
                        <p class="font-weight-bold">{{$service->posts}}</p>
                        @if($service->approve == 1) 
                            <p>Available</p>
                        @else
                            <p>Padding</p>
                        @endif  
                    </div>
                    <div class="px-3 text-center">
                        <p class="font-weight-bold">{{$service->numbers - $service->posts }}</p>
                        <p>Used</p>
                    </div>
                </div>
            </div>

            @if($service->approve == 0)
                <div class="col-lg-4">
                    <a href="{{url('contactUs')}}" style="padding-right: 15px;padding-top: 15px">
                        <button class="btn btn-lg btn-primary">Contact Admin</button>
                    </a>
                </div>
            @else
                <div class="col-lg-4">
                    @if($service->posts > 0)
                        <a href="{{url('/create/jobPost', $service->id )}}" style="padding-right: 15px;padding-top: 15px">
                            <button class="btn btn-lg btn-primary">Create Job post</button>
                        </a>
                    @else 
                        <a href="{{url('serviceListing')}}" style="padding-right: 15px;padding-top: 15px">
                            <button class="btn btn-lg btn-primary">Buy now</button>
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
@endforeach
</div>



@endsection