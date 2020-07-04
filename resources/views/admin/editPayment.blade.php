@extends('layouts.admin')

@section('title', 'Payment Method')

@section('header', 'Edit Payment Method')

@section('content')
    <div class="container">
        <div class="profile card mb-5">
            <div class="container px-5 py-4">
                <form action="{{action('Admin\PaymentController@update', $editPayment->id)}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">@lang('admin.typeofpayment')<span class="text-danger text-bold"></span></label>
                        <div class="col-sm-9">
                        <input type="text" name="type_of_payment" value="{{$editPayment->type_of_payment}}" placeholder="Please enter your firstname..."
                            class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">@lang('admin.map')<span class="text-danger text-bold"></span></label>
                        <div class="col-sm-9">
                        <input type="text" name="map" value="{{$editPayment->map}}" placeholder="Please enter your firstname..."
                            class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">@lang('admin.address') <span class="text-danger text-bold"></span></label>
                        <div class="col-sm-9">
                        <input type="text" name="address" value="{{$editPayment->address}}" placeholder="Please enter your firstname..."
                            class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">@lang('admin.contact')<span class="text-danger text-bold"></span></label>
                        <div class="col-sm-9">
                        <input type="text" name="contact" value="{{$editPayment->contact}}" placeholder="Please enter your firstname..."
                            class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">@lang('admin.accountname')<span class="text-danger text-bold"></span></label>
                        <div class="col-sm-9">
                        <input type="text" name="acc_name" value="{{$editPayment->acc_name}}" placeholder="Please enter your firstname..."
                            class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">@lang('admin.accountnumber')<span class="text-danger text-bold"></span></label>
                        <div class="col-sm-9">
                        <input type="text" name="acc_number" value="{{$editPayment->acc_number}}" placeholder="Please enter your firstname..."
                            class="form-control">
                        </div>
                    </div>

                    <div class="line"></div>
                    <div class="form-group row">
                        <div class="col-sm-4 offset-sm-3">
                            <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                            <a class="btn btn-outline-primary" href="/payment">@lang('admin.cancel')</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
