@extends('layouts.admin')

@section('title', 'Payment Method')

@section('header', 'Edit Payment Method')

@section('content')
    <div class="container">
        <div class="profile card mb-5">
            <div class="container px-5 py-4">
                <form action="{{action('Admin\PaymentController@update', $editPayment->id)}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                        
                    <h3 class="font-weight-bold pb-3">Cash Method</h3>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Map<span class="text-danger text-bold"></span></label>
                        <div class="col-sm-9">
                        <input type="text" name="map" value="{{$editPayment->map}}" placeholder="Please enter your firstname..."
                            class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Address <span class="text-danger text-bold"></span></label>
                        <div class="col-sm-9">
                        <input type="text" name="address" value="{{$editPayment->address}}" placeholder="Please enter your firstname..."
                            class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4 offset-sm-3">
                            <button type="submit" class="btn btn-primary">Save Change</button>
                            <a class="btn btn-outline-primary" href="{{url('payments')}}">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
