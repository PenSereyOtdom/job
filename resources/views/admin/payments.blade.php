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
                        <h2 class="font-weight-bold pb-4">Cash Method</h2>
                        @foreach($payment_cash as $cash)                        
                        <form action="{{action('Admin\PaymentController@edit', $cash->id)}}" method="post">
                            {{csrf_field()}}           

                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Jobnow office address:</label>
                            <div class="col-sm-9">
                            <p>{{$cash->address}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Map:</label>
                            <div class="col-sm-9">
                            <p>{{$cash->map}}</p>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit"><i type="submit" class="far fa-edit"></i> Edit</button>

                        </form>
                        @endforeach
                    </div>                                              

                    <div class="tab-pane fade" id="pills-aba" role="tabpanel" aria-labelledby="pills-aba-tab">
                        <h2 class="font-weight-bold pb-4">ABA Method</h2>
                        @foreach($payment_aba as $aba)
                            <form action="{{action('Admin\PaymentController@editaba', $aba->id)}}" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-3">
                                        <div class="col-8 pl-0"> 
                                            @if($aba->qr_aba)
                                                <img class="card-img-top profile-pic qr-pic img-thumbnail" src="{{ asset('/storage/qr_aba/' . $aba->qr_aba) }}"/>
                                            @else
                                                <img class="card-img-top profile-pic qr-pic img-thumbnail" src="{{asset('/img/qr.jpg')}}"/>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group row pt-3">
                                            <label class="col-sm-3 form-control-label">Account Name:</label>
                                            <div class="col-sm-9">
                                                <p>{{$aba->acc_name}}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 form-control-label">Account Number:</label>
                                            <div class="col-sm-9">
                                                <p>{{$aba->acc_number}}</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit"><i type="submit" class="far fa-edit"></i> Edit</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>

                    <div class="tab-pane fade" id="pills-wing" role="tabpanel" aria-labelledby="pills-wing-tab">
                        <h2 class="font-weight-bold pb-4">Wing Method</h2>
                        @foreach($payment_wing as $wing)
                            <form action="{{action('Admin\PaymentController@editwing', $wing->id)}}" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-3">
                                        <div class="col-8 pl-0"> 
                                            @if($wing->qr_wing)
                                                <img class="card-img-top profile-pic qr-pic img-thumbnail" src="{{ asset('/storage/qr_wing/' . $wing->qr_wing) }}"/>
                                            @else
                                                <img class="card-img-top profile-pic qr-pic img-thumbnail" src="{{asset('/img/qr.jpg')}}"/>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group row pt-3">
                                            <label class="col-sm-3 form-control-label">Account Name:</label>
                                            <div class="col-sm-9">
                                            <p>{{$wing->acc_name}}</p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 form-control-label">Account Number:</label>
                                            <div class="col-sm-9">
                                            <p>{{$wing->acc_number}}</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit"><i type="submit" class="far fa-edit"></i> Edit</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach                        
                    </div>

                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <h2 class="font-weight-bold pb-4">Contacts</h2>
                        @foreach($contact as $contacts)
                        <form action="{{action('Admin\PaymentController@editcontact', $contacts->id)}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Phone Number:</label>
                                <div class="col-sm-10">
                                <p>{{$contacts->contact1}}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Phone Number:</label>
                                <div class="col-sm-10">
                                <p>{{$contacts->contact2}}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Email:</label>
                                <div class="col-sm-10">
                                <p>{{$contacts->gmail}}</p>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit"><i type="submit" class="far fa-edit"></i> Edit</button>

                        </form>
                        @endforeach
                    </div>

                </div>
                
            </div>
        </div>
    </div>

@endsection