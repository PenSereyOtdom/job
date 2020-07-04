@extends('layouts.admin')

@section('title', '')

@section('header', 'Verify Packge')

@section('content')
    <!-- Administrator Information -->
    <div class="container">
        <div class="profile card mb-5">
            @foreach ($approval as $apl)
                <div class="container p-5">
                    <div class="row">
                        <div class="col-lg-3"> 
                            <div class="picture-container">
                                <div class="picture">
                                    @if($apl->company_profile)
                                        <img class="card-img-top" src="{{ asset('/storage/company_profile/' . $apl->company_profile) }}"/>
                                    @else
                                        <img class="card-img-top" src="{{asset('/img/user_company.jpg')}}"/>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 my-auto">
                        <h4 class="font-weight-bold">Company Information</h4>
                            <div class="row">
                                <div class="col-lg-3">
                                    <p class="small p-2">Username:</p>
                                    <p class="small p-2">Phone Number:</p>
                                    <p class="small p-2">Packge Name:</p>
                                    <p class="small p-2">Price:</p>
                                    <p class="small p-2">Payment Method:</p>
                                    @if(isset($apl->transaction_wing) || isset($apl->transaction_aba))
                                    <p class="small p-2">Transation Number:</p>
                                    @endif
                                </div>
                                <div class="col-lg-9">
                                    <p class="small p-2">{{ $apl->company_name }}</p>                        
                                    <p class="small p-2">{{ $apl->company_phone_number}}</p>                                    
                                    <p class="small p-2">{{ $apl->service_title }}</p>                        
                                    <p class="small p-2">{{ $apl->service_price}}</p>
                                    <p class="small p-2">{{ $apl->type_of_payment }}</p> 
                                    @if(isset($apl->transaction_wing))
                                        <p class="small p-2">{{ $apl->transaction_wing }}</p>
                                    @elseif(isset($apl->transaction_aba))
                                        <p class="small p-2">{{ $apl->transaction_aba }}</p>
                                    @else       
                                    @endif
                                </div>
                            </div>

                            <form action="{{action('Admin\VerifyPackageController@update', $apl->id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                @if($apl->approve == null || $apl->approve==0)
                                <button class="btn btn-primary w-25" name="approve" value="1">Verify</button>
                                @else
                                <button class="btn btn-primary w-25" name="approve" value="0">Unverified</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
