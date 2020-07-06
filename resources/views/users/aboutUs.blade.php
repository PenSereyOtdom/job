@extends('layouts.users')

@section('title', 'About Us')

@section('content')

@include('layouts.navbar2')
<div class="about-us container">
    <img class="card-img-top" src="img/about-us.jpg" alt="Contact Us">
    <div class="mt-5">
        <h3 class="font-weight-bold text-center">@lang('user.whoarewe')</h3>
        <p>The Group encompasses a strong international portfolio of employment and education businesses and is a market leader in online employment marketplaces, with deep and rich insights into the future of work.</p>
        <p>SEEK makes a positive impact on a global scale, with exposure to 2.9 billion people, more than 51 million students and learners and a presence in 18 countries including China and across South-East Asia and Latin America.</p>
    </div>
    <div class="row">
        <div class="col-6 my-auto">
            <img class="img-fluid" src="img/mission-vision.svg" alt="Mission Vision">
        </div>
        <div class="col-6 my-auto">
        <h3 class="font-weight-bold">@lang('user.vision')</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, ut dolor facere velit saepe sint?</p>
        <h3 class="font-weight-bold">Mission</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, ut dolor facere velit saepe sint?</p>        
        </div>
    </div>
    <div class="px-5 mt-5">
        <h3 class="font-weight-bold text-center">@lang('user.ourvalue')</h3>
        <ul>
            <li class="mb-2">Commitment: We will strive to achieve and exceed our customer's goals proactively.</li>
            <li class="mb-2">Attitude: We adopt a "CAN DO" attitude and do our best at all times</li>
            <li class="mb-2">Management: We manage with integrity at all time and uphold our corporate, social and environmental responsibilities.</li>
            <li class="mb-2">Honour: We will honour our services.</li>
            <li class="mb-2">Reliability: We can be depended upon to support our customers well and to their satisfication. We do it right the first time.</li>
        </ul>  
    </div>
    <div class="px-5 my-5">
        <h3 class="font-weight-bold text-center">@lang('user.corevalue')</h3>
        <ul>
            <li class="mb-2">RESPONSIVENESS: We will respond and act promptly in all our interactions with our customers.</li>
            <li class="mb-2">RELIABILITY: In the delivery of our products and services, we will ensure that Quality, Value, and Service are attained and sustained.</li>
            <li class="mb-2">RELIABILITY: In the delivery of our products and services, we will ensure that Quality, Value, and Service are attained and sustained.</li>
            <li class="mb-2">OWNERSHIP: We will remain responsible and put in extra effort in meeting the needs of our customers.</li>
        </ul>  
    </div>
</div>



@endsection