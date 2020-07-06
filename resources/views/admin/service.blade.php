@extends('layouts.admin')

@section('title', 'Services')

@section('header', 'Service Detail')

@section('content')
    
    <div class="service container">
        <div class="profile card mb-2">
            <div class="container px-5 py-4">
                @foreach($service_trial as $trial)   
                    <div class="float-right">              
                        <form action="{{action('Admin\ServicesController@edit', $trial->id)}}" method="post">
                            {{csrf_field()}}
                            <button class="btn btn-link" type="submit"><i type="submit" class="fas fa-edit"></i></button>       
                        </form>
                    </div>
                    <h3 class="font-weight-bold mb-4">Trail Plan</h3>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Price</label>
                        <div class="col-sm-9">
                        <p>{{$trial->price}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Number of Post</label>
                        <div class="col-sm-9">
                        <p>{{$trial->number_of_post}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Valid days</label>
                        <div class="col-sm-9">
                        <p>{{$trial->valid_days}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="service container">
        <div class="profile card mb-2">
            <div class="container px-5 py-4">
                @foreach($service_basic as $basic)                 
                    <div class="float-right">              
                        <form action="{{action('Admin\ServicesController@edit', $basic->id)}}" method="post">
                            {{csrf_field()}}
                            <button class="btn btn-link" type="submit"><i type="submit" class="fas fa-edit"></i></button>       
                        </form>
                    </div>
                    <h3 class="font-weight-bold mb-4">Basic Plan</h3>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Price</label>
                        <div class="col-sm-9">
                        <p>{{$basic->price}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Number of Post</label>
                        <div class="col-sm-9">
                        <p>{{$basic->number_of_post}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Valid days</label>
                        <div class="col-sm-9">
                        <p>{{$basic->valid_days}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="service container">
        <div class="profile card mb-2">
            <div class="container px-5 py-4">
                @foreach($service_urgent as $urgent)                 
                    <div class="float-right">              
                        <form action="{{action('Admin\ServicesController@edit', $urgent->id)}}" method="post">
                            {{csrf_field()}}
                            <button class="btn btn-link" type="submit"><i type="submit" class="fas fa-edit"></i></button>       
                        </form>
                    </div>
                    <h3 class="font-weight-bold mb-4">Urgent Plan</h3>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Price</label>
                        <div class="col-sm-9">
                        <p>{{$urgent->price}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Number of Post</label>
                        <div class="col-sm-9">
                        <p>{{$urgent->number_of_post}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Valid days</label>
                        <div class="col-sm-9">
                        <p>{{$urgent->valid_days}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="service container">
        <div class="profile card mb-2">
            <div class="container px-5 py-4">
                @foreach($service_premium as $premium)   

                    <div class="float-right">              
                        <form action="{{action('Admin\ServicesController@edit', $premium->id)}}" method="post">
                            {{csrf_field()}}
                            <button class="btn btn-link" type="submit"><i type="submit" class="fas fa-edit"></i></button>       
                        </form>
                    </div>    

                    <h3 class="font-weight-bold mb-4">Premium Plan</h3>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Price</label>
                        <div class="col-sm-9">
                        <p>{{$premium->price}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Number of Post</label>
                        <div class="col-sm-9">
                        <p>{{$premium->number_of_post}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Valid days</label>
                        <div class="col-sm-9">
                        <p>{{$premium->valid_days}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
