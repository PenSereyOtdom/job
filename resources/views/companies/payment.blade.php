@extends('layouts.companies')

@section('title', 'Payment Methods')

@section('header', 'Payment Methods')

@section('content')
    <div class="payment container">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-cash-tab" data-toggle="pill" href="#pills-cash" role="tab" aria-controls="pills-cash" aria-selected="true">@lang('company.cash')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-aba-tab" data-toggle="pill" href="#pills-aba" role="tab" aria-controls="pills-aba" aria-selected="false">@lang('company.ababank')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-wing-tab" data-toggle="pill" href="#pills-wing" role="tab" aria-controls="pills-wing" aria-selected="false">@lang('company.wing')</a>
            </li>
        </ul>
        
        <div class="profile card mb-5">     
            <div class="container px-5 py-4">
                <div class="tab-content" id="pills-tabContent"> 

                    <div class="tab-pane fade show active" id="pills-cash" role="tabpanel" aria-labelledby="pills-cash-tab">
<<<<<<< HEAD
                        <h1 class="font-weight-bold">Cash Payment</h1>  
                        @foreach($payment_cash as $cash)       

                            <p>1. Visit us at JOBNOW office located at {{$cash->address}} </p>
                            <p>2. When you visit our office, we will be giving you the payment receipt immediately.</p>
                            <p>3. Service will be provided after payment.</p>                    
                            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6837.307734450108!2d104.85473208378595!3d11.561451796333369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310951ce9bbfc447%3A0x47ac1cdb64ace078!2svKirirom%20Office!5e0!3m2!1sen!2skh!4v1582857176001!5m2!1sen!2skh"></iframe>
                        @endforeach

                    </div>                                              
=======
                        <h1 class="font-weight-bold">@lang('company.cashpayment')</h1>
                        <p>@lang('company.visitus')</p>
                        <p>@lang('company.visitouroffice')</p>
                        <p>@lang('company.afterpayment')</p>
                       
                    </div>
>>>>>>> master

                    <div class="tab-pane fade" id="pills-aba" role="tabpanel" aria-labelledby="pills-aba-tab">
                        <h1 class="font-weight-bold">@lang('company.ababankpayment')</h1>
                        <div class="row">
<<<<<<< HEAD
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
=======
                            <div class="col-2">
                                <p>@lang('company.account'):</p>
                            </div>
                            <div class="col-10">
                                <p>@lang('company.jobnowcompany')</p>
                            </div>
                            <div class="col-2">
                                <p>@lang('company.accountnumber'):</p>
                            </div>
                            <div class="col-10">
                                <p>000 211 222</p>
                            </div>
>>>>>>> master
                        </div>
                        <p class="font-weight-bold">@lang('company.abamobile')</p>
                        <p class="pl-4">@lang('company.openabamobile')</p>
                        <p class="pl-4">@lang('company.transfer')</p>
                        <p class="pl-4">@lang('company.enteraccount')</p>
                        <p class="font-weight-bold">@lang('company.goto')</p>
                        <p class="pl-4">@lang('company.transfermoney')</p>

<<<<<<< HEAD
                        <p class="font-weight-bold">Contact us</p>
                        @foreach($contact as $contacts)
                            <p class="pl-4">{{$contacts->contact1}}</p> 
                            <p class="pl-4">{{$contacts->contact2}}</p>
                            <p class="pl-4">{{$contacts->gmail}}</p> 
                        @endforeach            
=======
                        <p class="font-weight-bold">@lang('company.contactus')</p>
                        <p>+885 12 345 678</p>
                        <p>+885 12 345 678</p>                        
>>>>>>> master
                    </div>
                    
                    <div class="tab-pane fade" id="pills-wing" role="tabpanel" aria-labelledby="pills-wing-tab">
                        <h1 class="font-weight-bold">@lang('company.wingpay')</h1>
                        <div class="row">
                        @foreach($payment_wing as $wing)
                            <div class="col-2">
                                <p>@lang('company.account'):</p>
                            </div>
                            <div class="col-10">
<<<<<<< HEAD
                                <p>{{$wing->acc_name}}</p>
=======
                                <p>@lang('company.jobnowcompany')</p>
>>>>>>> master
                            </div>
                            <div class="col-2">
                                <p>@lang('company.accountnumber'):</p>
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
                        <p class="font-weight-bold">@lang('company.wingmobile')</p>
                        <p class="pl-4">@lang('company.openwingmobile')</p>
                        <p class="pl-4">@lang('company.qrpay')</p>
                        <p class="pl-4">@lang('company.scanqr')</p>
                        <p class="pl-4">@lang('company.amount')</p>
                        <p class="font-weight-bold">@lang('company.nearestwing')</p>
                        <p class="pl-4">@lang('company.tranfermerchant')</p>

<<<<<<< HEAD
                        <p class="font-weight-bold">Contact us</p>
                        @foreach($contact as $contacts)
                            <p class="pl-4">{{$contacts->contact1}}</p> 
                            <p class="pl-4">{{$contacts->contact2}}</p>
                            <p class="pl-4">{{$contacts->gmail}}</p> 
                        @endforeach
                    </div>
=======
                        <p class="font-weight-bold">@lang('company.contactus')</p>
                        <p>+885 12 345 678</p>
                        <p>+885 12 345 678</p> 
                    </div>   
>>>>>>> master
                </div>
            </div>
        </div>
    </div>
@endsection
