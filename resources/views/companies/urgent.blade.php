@extends('layouts.companies')

@section('title', 'Our Services')

@section('header', 'Our Services')

@section('content')
<div class="pay container">
        <div class="profile card mb-5">
        
            <div class="container px-5 py-4">
                @if(sizeof($service_approval__check) == 0 || $service_approval__check[0]->post_number <= 0)
                <form class="form-horizontal" method="POST" action="{{url('/urgent')}}" enctype="multiple/form-data">
                    {!! csrf_field() !!}
                    <input name="admin_id" value="1" type="hidden">
                    <input name="service_id" value="3" type="hidden">

                    <h3 class="font-weight-bold pb-3">How do you want to pay?</h3>  

                    <div class="row my-3">
                        <div class="col-2"><p class="text-secondary small mb-0">Service Type</p> <p>Urgent</p></div>
                        <div class="col-2"><p class="text-secondary small mb-0">Price</p> <p>60$</p></div>
                    </div>
                    <h>Select one payment method below</h5><br>

                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-cash-tab" data-toggle="pill" href="#pills-cash" role="tab" aria-controls="pills-cash" aria-selected="true">
                                <img class="img-fluid" src="{{asset('img/cash-payment.svg')}}"> 
                                <p class="text-center">Cash</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-aba-tab" data-toggle="pill" href="#pills-aba" role="tab" aria-controls="pills-aba" aria-selected="false">
                                <img class="img-fluid" src="{{asset('img/bank-payment.svg')}}">
                                <p class="text-center">ABA Bank</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-wing-tab" data-toggle="pill" href="#pills-wing" role="tab" aria-controls="pills-wing" aria-selected="false">
                                <img class="img-fluid" src="{{asset('img/bank-payment.svg')}}">
                                <p class="text-center">Wing</p>
                            </a>
                        </li>
                    </ul>


                    <div class="tab-content" id="pills-tabContent"> 

                        <div class="tab-pane fade show active" id="pills-cash" role="tabpanel" aria-labelledby="pills-cash-tab"> 
                            <p><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Our staff will contact you soon!!</p>
                            <button name="payment_id" value="1" type="submit" class="btn btn-primary">Finish</button>     
                        </div>

                        <div class="tab-pane fade" id="pills-aba" role="tabpanel" aria-labelledby="pills-aba-tab">
                            <div class="form-group">
                                <label class="form-control-label">Place Your Transaction Number Here:</label>
                                <input type="text" name="transaction_aba" value="" placeholder="5463542132..." class="form-control w-50">
                            </div>
                            <button name="payment_id" value="2"  type="submit" class="btn btn-primary">Finish</button>
                        </div>

                        
                        <div class="tab-pane fade" id="pills-wing" role="tabpanel" aria-labelledby="pills-wing-tab">
                            <div class="form-group">
                                <label class="form-control-label">Place Your Transaction Number Here:</label>
                                <input type="text" name="transaction_wing" value="" placeholder="5463542132..." class="form-control w-50">                                    
                            </div>
                            <button name="payment_id" value="3" type="submit" class="btn btn-primary">Finish</button>
                        </div>   

                    </div>

                </form>
                @elseif ($service_approval__check[0]->approve == 0)
                    <p>Status pending {{$service_approval__check[0]->approve}}</p>
                @else
                    <p>your reminding {{$service_approval__check[0]->post_number}}</p>  
                @endif
            </div>
        </div>
    </div>
@endsection
