@extends('layouts.admin')

@section('title', 'Payment Method')

@section('header', 'Edit Payment Method')

@section('content')
    <div class="container">
        <div class="profile card mb-5">
            <div class="container px-5 py-4">
                <h3 class="font-weight-bold pb-3">Wing Method</h3>
                <form action="{{action('Admin\PaymentController@update', $editPayment->id)}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-3">
                            <div class="col-8 pl-0">
                                <div class="justify-content-center">
                                    @if($editPayment->qr_wing)
                                        <img class="card-img-top profile-pic qr-pic img-thumbnail" src="{{ asset('storage/qr_wing/' . $editPayment->qr_wing) }}" />
                                    @else
                                        <img class="card-img-top profile-pic qr-pic img-thumbnail" src="{{asset('/img/qr.jpg')}}" />
                                    @endif
                                    <div class="p-image text-center">
                                        <i class="fa fa-camera upload-button"></i>
                                        <input class="file-upload" name="qr_wing" type="file" id="" accept="image/*" style="display:none;"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label class="form-control-label">Account Name<span class="text-danger text-bold"></span></label>
                                <input type="text" name="acc_name" value="{{$editPayment->acc_name}}" placeholder="Please enter your firstname..." class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Account Number<span class="text-danger text-bold"></span></label>
                                <input type="text" name="acc_number" value="{{$editPayment->acc_number}}" placeholder="Please enter your firstname..." class="form-control">                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save Change</button>
                                <a class="btn btn-outline-primary" href="/payments">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>   
    <script>
        $(document).ready(function () {
        var readURL = function (input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.profile-pic').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".file-upload").on('change', function () {
            readURL(this);
        });

        $(".upload-button").on('click', function () {
            $(".file-upload").click();
        });
        });
    </script>
@endsection
