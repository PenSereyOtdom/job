@extends('layouts.user')

@section('title', 'Contact Us')

@section('content')

@include('layouts.navbar2')
<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <h4 class="font-weight-bold">Contact Information</h4>
            <h6 class="font-weight-bold">Address</h6>
            <p>#12, Street 2001, Phum Paprak Khang Tboung, Sangkat Kakab, Khan Porsenchey, Phnom Penh, Cambodia.</p>
            <h6 class="font-weight-bold">Phone Number</h6>
            <p class="mb-0">+885 12 345 678</p>
            <p>+885 12 345 678</p>
        </div>
        <div class="col-lg-6 col-sm-12">
            <h4 class="font-weight-bold mb-3">Send Message</h4>
            <form action="#" method="post">
                @if (Session::has('done-message'))
                    <div class="alert alert-success" role="alert">
                    {{Session::get('done-message')}}
                    </div>
                @endif
                <div class="form-group">
                    <label for="name">Full Name :</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Your Name">
                    @if ($errors->has('name'))
                    <small class="text-danger">{{$errors->first('name')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="text" id="email" class="form-control"name="email" placeholder="Your Email">
                    @if ($errors->has('email'))
                    <small class="text-danger">{{$errors->first('email')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="message">Message :</label>
                    <textarea cols="30" rows="7" id="message" class="form-control" name="message" placeholder="Message"></textarea>
                    @if ($errors->has('message'))
                    <small class="text-danger">{{$errors->first('message')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    @csrf
                    <button class="btn btn-outline-primary" type="submit">Send Message</button>
                </div>
            </form>
        </div>
        <div class="col-12">
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6837.307734450108!2d104.85473208378595!3d11.561451796333369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310951ce9bbfc447%3A0x47ac1cdb64ace078!2svKirirom%20Office!5e0!3m2!1sen!2skh!4v1582857176001!5m2!1sen!2skh"></iframe>
        </div>
    </div>
    
</div>
@endsection