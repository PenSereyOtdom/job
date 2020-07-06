@extends('layouts.admin')

@section('title', 'Services')

@section('header', 'Edit Services')

@section('content')
    <div class="container">
        <div class="profile card mb-5">
            <div class="container px-5 py-4">
                <h3 class="font-weight-bold mb-4">{{$editService->title}}</h3>
                <form action="{{action('Admin\ServicesController@update', $editService->id)}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Price<span class="text-danger text-bold"></span></label>
                        <div class="col-sm-9">
                        <input type="text" name="price" value="{{$editService->price}}" placeholder="Please enter your firstname..."
                            class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Number of Post<span class="text-danger text-bold"></span></label>
                        <div class="col-sm-9">
                        <input type="text" name="number_of_post" value="{{$editService->number_of_post}}" placeholder="Please enter your firstname..."
                            class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Number of Post<span class="text-danger text-bold"></span></label>
                        <div class="col-sm-9">
                        <input type="text" name="valid_days" value="{{$editService->valid_days}}" placeholder="Please enter your firstname..."
                            class="form-control">
                        </div>
                    </div>

                    <div class="line"></div>
                    <div class="form-group row">
                        <div class="col-sm-4 offset-sm-3">
                            <button type="submit" class="btn btn-primary">Save Change</button>
                            <a class="btn btn-outline-primary" href="/service">Cancel</a>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
