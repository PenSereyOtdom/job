@extends('layouts.admin')

@section('title', 'Payment Method')

@section('header', 'Payment Method')

@section('content')
    
    <div class="payment container">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-cash-tab" data-toggle="pill" href="#pills-cash" role="tab" aria-controls="pills-cash" aria-selected="true">Cash</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-aba-tab" data-toggle="pill" href="#pills-aba" role="tab" aria-controls="pills-aba" aria-selected="false">ABA Bank</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-wing-tab" data-toggle="pill" href="#pills-wing" role="tab" aria-controls="pills-wing" aria-selected="false">Wing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contacts</a>
            </li>
        </ul>
        <div class="profile card mb-5">
            <div class="container px-5 py-4">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-cash" role="tabpanel" aria-labelledby="pills-cash-tab">
                        @foreach($payment_cash as $cash)                 
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">@lang('admin.jobnowoffice')</label>
                            <div class="col-sm-9">
                            <p>{{$cash->address}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">@lang('admin.map')</label>
                            <div class="col-sm-9">
                            <p>{{$cash->map}}</p>
                            </div>
                        </div>
                        <form action="{{action('Admin\PaymentController@edit', $cash->id)}}" method="post">
                            {{csrf_field()}}
                            <button class="btn btn-primary" type="submit"><i type="submit" class="far fa-edit"></i> @lang('admin.edit')</button>
                        </form>
                        @endforeach
                    </div>                                              

                    <div class="tab-pane fade" id="pills-aba" role="tabpanel" aria-labelledby="pills-aba-tab">
                        @foreach($payment_aba as $aba)
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">@lang('admin.accountname')</label>
                            <div class="col-sm-9">
                            <p>{{$aba->acc_name}}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">@lang('admin.accountnumber')</label>
                            <div class="col-sm-9">
                            <p>{{$aba->acc_number}}</p>
                            </div>
                        </div>
                        @endforeach
                        <form action="{{action('Admin\PaymentController@edit', $aba->id)}}" method="post">
                            {{csrf_field()}}
                            <button class="btn btn-primary" type="submit"><i type="submit" class="far fa-edit"></i> @lang('admin.edit')</button>
                        </form>
                    </div>
                    
                    <div class="tab-pane fade" id="pills-wing" role="tabpanel" aria-labelledby="pills-wing-tab">
                        @foreach($payment_wing as $wing)
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">@lang('admin.accountname')</label>
                            <div class="col-sm-9">
                            <p>{{$wing->acc_name}}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">@lang('admin.accountnumber')</label>
                            <div class="col-sm-9">
                            <p>{{$wing->acc_number}}</p>
                            </div>
                        </div>
                        <form action="{{action('Admin\PaymentController@edit', $wing->id)}}" method="post">
                            {{csrf_field()}}
                            <button class="btn btn-primary" type="submit"><i type="submit" class="far fa-edit"></i> @lang('admin.edit')</button>
                        </form>
                        @endforeach
                    </div>

                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        @foreach($contact as $contacts)
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">@lang('admin.contact')</label>
                                <div class="col-sm-9">
                                <p>{{$contacts->contact}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                
            </div>
        </div>
    </div>

@endsection
