@extends('layouts.companies')

@section('title', 'Our Services')

@section('header', 'Our Services')

@section('content')
<div class="container">
    
    <div class="row mt-5 mb-4">
        @foreach($service_trial as $trial)
        <div class="col-lg-3 col-md-6 col-sm-6 pb-5">
            <div class="card p-4">
                <div class="text-center">
                    <h3 class="font-weight-bold text-trail">Trail Plan</h3>
                    <h4 class="font-weight-bold pt-2">{{$trial->price}}</h4>
                </div>
                <p>Benefits :</p>
                <p><i class="far fa-check-circle mr-2"></i> {{$trial->type}}</p>
                <p><i class="far fa-check-circle mr-2"></i> {{$trial->number_of_post}} job posts</p>
                <p><i class="far fa-check-circle mr-2"></i> Job expiry {{$trial->valid_days}} days</p>
                <a href="{{url('/trail', $trial->id )}}" class="btn btn-trail">Buy</a>
            </div>
        </div>
        @endforeach

        @foreach($service_basic as $basic) 
        <div class="col-lg-3 col-md-6 col-sm-6 pb-5">
            <div class="card p-4">
                <div class="text-center">
                    <h3 class="font-weight-bold text-basic">Basic Plan</h3>
                    <h4 class="font-weight-bold pt-2">{{$basic->price}}</h4>
                </div>
                <p>Benefits :</p>
                <p><i class="far fa-check-circle mr-2"></i> {{$basic->type}}</p>
                <p><i class="far fa-check-circle mr-2"></i> {{$basic->number_of_post}} job posts</p>
                <p><i class="far fa-check-circle mr-2"></i> Job expiry {{$basic->valid_days}} days</p>
                <a href="{{url('/basic',$basic->id)}}" class="btn btn-basic">Buy</a>
            </div>
        </div>
        @endforeach

        @foreach($service_urgent as $urgent)
        <div class="col-lg-3 col-md-6 col-sm-6 pb-5">
            <div class="card p-4">
                <div class="text-center">
                    <h3 class="font-weight-bold text-urgent">Urgent Plan</h3>
                    <h4 class="font-weight-bold pt-2">{{$urgent->price}}</h4>
                </div>
                <p>Benefits :</p>
                <p><i class="far fa-check-circle mr-2"></i>{{$urgent->type}}</p>
                <p><i class="far fa-check-circle mr-2"></i> {{$urgent->number_of_post}} job posts</p>
                <p><i class="far fa-check-circle mr-2"></i> Job expiry {{$urgent->valid_days}} days</p>
                <a href="{{url('/urgent',$urgent->id)}}" class="btn btn-urgent">Buy</a>
            </div>
        </div>
        @endforeach

        @foreach($service_premium as $premium) 
        <div class="col-lg-3 col-md-6 col-sm-6 pb-5">
            <div class="card p-4">
                <div class="text-center">
                    <h3 class="font-weight-bold text-premium">Premium Plan</h3>
                    <h4 class="font-weight-bold pt-2">{{$premium->price}}</h4>
                </div>
                <p>Benefits :</p>
                <p><i class="far fa-check-circle mr-2"></i> {{$premium->type}}</p>
                <p><i class="far fa-check-circle mr-2"></i> {{$premium->number_of_post}} job posts</p>
                <p><i class="far fa-check-circle mr-2"></i> Job expiry {{$premium->valid_days}} days</p>
                <a href="{{url('/premium',$premium->id)}}" class="btn btn-primary" >Buy</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection