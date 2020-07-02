@extends('layouts.companies')

@section('title', 'Why Us')

@section('header', 'Why Us?')

@section('content')
<section class="container">
    <div class="text-center">
        <img src="{{asset('img/jobnow_logo.svg')}}" alt="Job Now Logo" class="img-fluid">
    </div>
    <div class="row">
        <div class="col-6 my-auto">
            <h1 class="font-weight-bold">Overview</h1>
            <p>This is overview contect. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Hendrerit ut libero, ut dui volutpat. Lectus eget diam, pulvinar maecenas in est interdum eu duis.</p>
        </div>
        <div class="col-6 my-auto">
            <img class="img-fluid" src="img/hero-background.svg" alt="Background">
        </div>
    </div>
</section>
<section class="container">
    <div class="row">
        <div class="col-6 my-auto">
            <img class="img-fluid" src="img/mission-vision.svg" alt="Mission Vision">
        </div>
        <div class="col-6 my-auto">
            <h3 class="font-weight-bold">Vision</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, ut dolor facere velit saepe sint?</p>
            <h3 class="font-weight-bold">Mission</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, ut dolor facere velit saepe sint?</p>    
        </div>
    </div>
</section>
<section class="container">
    <h3 class="font-weight-bold text-center">Commitment</h3>
    <div class="row text-center pt-3">
        <div class="col-4">
            <div class="my-3">
                <img class="img-fluid rounded-circle" style="width:100px;" src="img/user_female.png" alt="user_female">
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Hendrerit ut libero, ut dui volutpat.</p>
        </div>
        <div class="col-4">
            <div class="my-3">
                <img class="img-fluid rounded-circle" style="width:100px;" src="img/user_female.png" alt="user_female">
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Hendrerit ut libero, ut dui volutpat.</p>
        </div>
        <div class="col-4">
            <div class="my-3">
                <img class="img-fluid rounded-circle" style="width:100px;" src="img/user_female.png" alt="user_female">
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Hendrerit ut libero, ut dui volutpat.</p>
        </div>
    </div>
</section>

<div class="text-center">
    <button class="btn btn-lg btn-primary">Get Started</button>
</div>
@endsection
