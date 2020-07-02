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
                        <p>1. Visit us at JOBNOW office located at #21, St. 2004, Songkat ABC, Khan Por Sen Chey, Phnom Penh, Cambodia. </p>
                        <p>2. When you visit our office, we will be giving you the payment receipt immediately.</p>
                        <p>3. Service will be provided after payment.</p>
                       
                    </div>

                    <div class="tab-pane fade" id="pills-aba" role="tabpanel" aria-labelledby="pills-aba-tab">
                        <h1 class="font-weight-bold">ABA Bank Payment</h1> 
                        <div class="row">
                            <div class="col-2">
                                <p>Account Name:</p>
                            </div>
                            <div class="col-10">
                                <p>JOBNOW COMPANY</p>
                            </div>
                            <div class="col-2">
                                <p>Account NUmber:</p>
                            </div>
                            <div class="col-10">
                                <p>000 211 222</p>
                            </div>
                        </div>
                        <p class="font-weight-bold">Using ABA Mobile application</p>
                        <p class="pl-4">1. Open ABA Mobile application</p>
                        <p class="pl-4">2. Go to Transfers and select Transfter to Any ABA Account</p>
                        <p class="pl-4">3. Enter our Account Number and amount to pay</p>
                        <p class="font-weight-bold">Or Go to the nearest ABA Bank</p>
                        <p class="pl-4">And transfer money to our account.</p>

                        <p class="font-weight-bold">Contact us</p>
                        <p>+885 12 345 678</p>
                        <p>+885 12 345 678</p>                        
                    </div>

                    
                    <div class="tab-pane fade" id="pills-wing" role="tabpanel" aria-labelledby="pills-wing-tab">
                        <h1 class="font-weight-bold">Wing Payment</h1> 
                        <div class="row">
                            <div class="col-2">
                                <p>Account Name:</p>
                            </div>
                            <div class="col-10">
                                <p>JOBNOW COMPANY</p>
                            </div>
                            <div class="col-2">
                                <p>Account NUmber:</p>
                            </div>
                            <div class="col-10">
                                <p>1222</p>
                            </div>
                        </div>
                        <p class="font-weight-bold">Using Wing Mobile application</p>
                        <p class="pl-4">1. Open Wing Mobile application</p>
                        <p class="pl-4">2. Go to QR Pay</p>
                        <p class="pl-4">3. Scan our QR code above or Enter our Merchant ID manually</p>
                        <p class="pl-4">4. Enter amount and click Pay</p>
                        <p class="font-weight-bold">Or Go to the nearest Wing Express</p>
                        <p class="pl-4">And transfer money to our Merchant ID.</p>

                        <p class="font-weight-bold">Contact us</p>
                        <p>+885 12 345 678</p>
                        <p>+885 12 345 678</p> 
                    </div>   
                </div>
            </div>
        </div>
    </div>
@endsection
