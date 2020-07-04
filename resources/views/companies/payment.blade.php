@extends('layouts.companies')

@section('title', 'Payment Methods')

@section('header', 'Payment Methods')

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
        </ul>
        
        <div class="profile card mb-5">     
            <div class="container px-5 py-4">
                <div class="tab-content" id="pills-tabContent"> 

                    <div class="tab-pane fade show active" id="pills-cash" role="tabpanel" aria-labelledby="pills-cash-tab">
                        <h1 class="font-weight-bold">Cash Payment</h1>  
                        @foreach($payment_cash as $cash)       

                            <p>1. Visit us at JOBNOW office located at {{$cash->address}} </p>
                            <p>2. When you visit our office, we will be giving you the payment receipt immediately.</p>
                            <p>3. Service will be provided after payment.</p>                    
                            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6837.307734450108!2d104.85473208378595!3d11.561451796333369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310951ce9bbfc447%3A0x47ac1cdb64ace078!2svKirirom%20Office!5e0!3m2!1sen!2skh!4v1582857176001!5m2!1sen!2skh"></iframe>
                        @endforeach

                    </div>                                              

                    <div class="tab-pane fade" id="pills-aba" role="tabpanel" aria-labelledby="pills-aba-tab">
                        <h1 class="font-weight-bold">ABA Bank Payment</h1> 
                        <div class="row">
                            @foreach($payment_aba as $aba)
                                <div class="col-2">
                                    <p>Account Name:</p>
                                </div>
                                <div class="col-10">
                                    <p>{{$aba->acc_name}}</p>
                                </div>
                                <div class="col-2">
                                    <p>Account Number:</p>
                                </div>
                                <div class="col-10">
                                    <p>{{$aba->acc_number}}</p>
                                </div>
                                
                                <div class="col-lg-2"> 
                                    @if($aba->qr_aba)
                                        <img class="card-img-top profile-pic img-thumbnail" src="{{ asset('/storage/qr_aba/' . $aba->qr_aba) }}"/>
                                    @else
                                        <img class="card-img-top profile-pic img-thumbnail" src="{{asset('/img/qr.jpg')}}"/>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <p class="font-weight-bold">Using ABA Mobile application</p>
                        <p class="pl-4">1. Open ABA Mobile application</p>
                        <p class="pl-4">2. Go to Transfers and select Transfter to Any ABA Account</p>
                        <p class="pl-4">3. Enter our Account Number and amount to pay</p>
                        <p class="font-weight-bold">Or Go to the nearest ABA Bank</p>
                        <p class="pl-4">And transfer money to our account.</p>

                        <p class="font-weight-bold">Contact us</p>
                        @foreach($contact as $contacts)
                            <p class="pl-4">{{$contacts->contact1}}</p> 
                            <p class="pl-4">{{$contacts->contact2}}</p>
                            <p class="pl-4">{{$contacts->gmail}}</p> 
                        @endforeach            
                    </div>
                    
                    <div class="tab-pane fade" id="pills-wing" role="tabpanel" aria-labelledby="pills-wing-tab">
                        <h1 class="font-weight-bold">Wing Payment</h1> 
                        <div class="row">
                        @foreach($payment_wing as $wing)
                            <div class="col-2">
                                <p>Account Name:</p>
                            </div>
                            <div class="col-10">
                                <p>{{$wing->acc_name}}</p>
                            </div>
                            <div class="col-2">
                                <p>Account NUmber:</p>
                            </div>
                            <div class="col-10">
                                <p>{{$wing->acc_number}}</p>
                            </div>

                            <div class="col-lg-2"> 
                                @if($wing->qr_wing)
                                    <img class="card-img-top profile-pic img-thumbnail" src="{{ asset('/storage/qr_wing/' . $wing->qr_wing) }}"/>
                                @else
                                    <img class="card-img-top profile-pic img-thumbnail" src="{{asset('/img/qr.jpg')}}"/>
                                @endif
                            </div>

                        @endforeach
                        </div>
                        <p class="font-weight-bold">Using Wing Mobile application</p>
                        <p class="pl-4">1. Open Wing Mobile application</p>
                        <p class="pl-4">2. Go to QR Pay</p>
                        <p class="pl-4">3. Scan our QR code above or Enter our Merchant ID manually</p>
                        <p class="pl-4">4. Enter amount and click Pay</p>
                        <p class="font-weight-bold">Or Go to the nearest Wing Express</p>
                        <p class="pl-4">And transfer money to our Merchant ID.</p>

                        <p class="font-weight-bold">Contact us</p>
                        @foreach($contact as $contacts)
                            <p class="pl-4">{{$contacts->contact1}}</p> 
                            <p class="pl-4">{{$contacts->contact2}}</p>
                            <p class="pl-4">{{$contacts->gmail}}</p> 
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
