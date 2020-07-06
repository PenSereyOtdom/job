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
                        <h1 class="font-weight-bold">@lang('company.cashpayment')</h1>
                        <p>@lang('company.visitus')</p>
                        <p>@lang('company.visitouroffice')</p>
                        <p>@lang('company.afterpayment')</p>
                       
                    </div>

                    <div class="tab-pane fade" id="pills-aba" role="tabpanel" aria-labelledby="pills-aba-tab">
                        <h1 class="font-weight-bold">@lang('company.ababankpayment')</h1>
                        <div class="row">
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
                        </div>
                        <p class="font-weight-bold">@lang('company.abamobile')</p>
                        <p class="pl-4">@lang('company.openabamobile')</p>
                        <p class="pl-4">@lang('company.transfer')</p>
                        <p class="pl-4">@lang('company.enteraccount')</p>
                        <p class="font-weight-bold">@lang('company.goto')</p>
                        <p class="pl-4">@lang('company.transfermoney')</p>

                        <p class="font-weight-bold">@lang('company.contactus')</p>
                        <p>+885 12 345 678</p>
                        <p>+885 12 345 678</p>                        
                    </div>

                    
                    <div class="tab-pane fade" id="pills-wing" role="tabpanel" aria-labelledby="pills-wing-tab">
                        <h1 class="font-weight-bold">@lang('company.wingpay')</h1>
                        <div class="row">
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
                                <p>1222</p>
                            </div>
                        </div>
                        <p class="font-weight-bold">@lang('company.wingmobile')</p>
                        <p class="pl-4">@lang('company.openwingmobile')</p>
                        <p class="pl-4">@lang('company.qrpay')</p>
                        <p class="pl-4">@lang('company.scanqr')</p>
                        <p class="pl-4">@lang('company.amount')</p>
                        <p class="font-weight-bold">@lang('company.nearestwing')</p>
                        <p class="pl-4">@lang('company.tranfermerchant')</p>

                        <p class="font-weight-bold">@lang('company.contactus')</p>
                        <p>+885 12 345 678</p>
                        <p>+885 12 345 678</p> 
                    </div>   
                </div>
            </div>
        </div>
    </div>
@endsection
