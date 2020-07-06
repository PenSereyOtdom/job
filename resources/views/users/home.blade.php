@extends('layouts.users')

@section('title', 'Home')

@section('content')
@include('layouts.navbar')
    <!-- Search and Filter -->
    @include('layouts.searchfilter')

    @if(!Auth::check())
        @include('layouts.signin')
    @endif
    <section class="image-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 my-auto">
                    <div class="row">
                        <div class="col-lg-11 col-md-11 text-center mb-5">
                            <h2 class="pb-3 font-weight-bold text-white">We're here to help you navigate these challenging times</h2>
                            <a href="/careerAdvise"><button class="btn btn-lg btn-outline-secondary">Get advice and resources</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="text-center">
                        <img class="img-fluid" src="img/Working-with-laptop.svg" alt="Working with laptop">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="quick-search-section py-5">
        <div class="container">
            <h3 class="font-weight-bold">Quick search</h3>
            <div class="row mb-3">
                <div class="col-2">
                    <span class="pr-3 py-2 font-weight-bold">Job Classifications</span>  
                </div>
                <div class="col-10">
                <?php foreach($job_classifications as $indexKey => $job_classification){ ?>
                    @if($indexKey < 5)
                        <span class="pr-3 py-2"><a href="{{url('quick',$job_classification->job_classification )}}"><?php echo $job_classification->job_classification ?></a></span>
                    @elseif($indexKey == 5)
                        <span class="pr-3 py-2"><a href="" id="classification" data-toggle="collapse" data-target=".classificationToggler" aria-controls="classificationToggler" aria-expanded="false"><span id="view_classification">View All</span> <i class="fa fa-angle-down fa1" aria-hidden="true"></i></a></span><br>
                        <span class="collapse classificationToggler pr-3 py-2"><a href="{{url('quick',$job_classification->job_classification )}}"><?php echo $job_classification->job_classification ?></a></span>                       
                    @elseif($indexKey > 5)
                        <span class="collapse classificationToggler pr-3 py-2"><a href="{{url('quick',$job_classification->job_classification )}}"><?php echo $job_classification->job_classification ?></a></span>                       
                    @endif
                <?php } ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-2">
                    <span class="pr-3 py-2 font-weight-bold">Type of Job</span>
                </div>
                <div class="col-10">
                <?php foreach($job_types as $indexKey => $job_type){ ?>
                    @if($indexKey < 5)
                        <span class="pr-3 py-2"><a href="{{url('quick',$job_type->job_type )}}"><?php echo $job_type->job_type?></a></span>
                    @elseif($indexKey == 5)
                        <span class="pr-3 py-2"><a href="" id="jobType" data-toggle="collapse" data-target=".jobTypeToggler" aria-controls="jobTypeToggler" aria-expanded="false"><span id="view_jobType">View All</span> <i class="fa fa-angle-down fa2" aria-hidden="true"></i></a></span><br>
                        <span class="collapse jobTypeToggler pr-3 py-2"><a href="{{url('quick',$job_type->job_type )}}"><?php echo $job_type->job_type?></a></span>                       
                    @elseif($indexKey > 5)
                        <span class="collapse jobTypeToggler pr-3 py-2"><a href="{{url('quick',$job_type->job_type )}}"><?php echo $job_type->job_type?></a></span>                       
                    @endif
                <?php } ?> 
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-2">
                    <span class="pr-3 py-2 font-weight-bold">Salary Range</span>
                </div>
                <div class="col-10">
                <?php foreach($salary_ranges as $indexKey => $salary_range){ ?>
                    @if($indexKey < 5)
                        <span class="pr-3 py-2"><a href="{{url('quick',$salary_range->salary_range )}}"><?php echo $salary_range->salary_range?></a></span>
                    @elseif($indexKey == 5)
                        <span class="pr-3 py-2"><a href="" id="salary" data-toggle="collapse" data-target=".salaryToggler" aria-controls="salaryToggler" aria-expanded="false"><span id="view_salary">View All</span> <i class="fa fa-angle-down fa3" aria-hidden="true"></i></a></span><br>
                        <span class="collapse salaryToggler pr-3 py-2"><a href="{{url('quick',$salary_range->salary_range )}}"><?php echo $salary_range->salary_range?></a></span>                       
                    @elseif($indexKey > 5)
                        <span class="collapse salaryToggler pr-3 py-2"><a href="{{url('quick',$salary_range->salary_range )}}"><?php echo $salary_range->salary_range?></a></span>                       
                    @endif
                <?php } ?> 
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-2">
                    <span class="pr-3 py-2 font-weight-bold">Location</span>
                </div>
                <div class="col-10">
                    <span class="pr-3 py-2"><a href="{{url('quick', 'Phnom Penh')}}">Phnom Penh</a></span>
                    <span class="pr-3 py-2"><a href="{{url('quick', 'Siem Reap')}}">Siem Reap</a></span>
                    <span class="pr-3 py-2"><a href="{{url('quick', 'Battambang')}}">Battambang</a></span>
                    <span class="pr-3 py-2"><a href="{{url('quick', 'Kandal')}}">Kandal</a></span>
                    <span class="pr-3 py-2"><a href="{{url('quick', 'Kampong Cham')}}">Kampong Cham</a></span>
                    <span class="pr-3 py-2"><a href="" id="location" data-toggle="collapse" data-target=".locationToggler" aria-controls="locationToggler" aria-expanded="false"><span id="view_location">View All</span> <i class="fa fa-angle-down fa4" aria-hidden="true"></i></a></span><br>
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Banteay Meanchey')}}">Banteay Meanchey</a></span> 
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Kampong Cham')}}">Kampong Cham</a></span>
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Kampong Chhnang')}}">Kampong Chhnang</a></span>             
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Kampong Speu')}}">Kampong Speu</a></span>             
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Kampong Thom')}}">Kampong Thom</a></span>             
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Kampot')}}">Kampot</a></span>             
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Kandal')}}">Kandal</a></span>             
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Kep')}}">Kep</a></span>             
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Koh Kong')}}">Koh Kong</a></span>             
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Mondulkiri')}}">Mondulkiri</a></span>             
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Oddar Meanchey')}}">Oddar Meanchey</a></span>   
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Pailin')}}">Pailin</a></span>             
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Preah Vihear')}}">Preah Vihear</a></span>             
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Prey Veng')}}">Prey Veng</a></span>             
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Pursat')}}">Pursat</a></span>             
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Ratanakiri')}}">Ratanakiri</a></span>             
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Sihanoukville')}}">Sihanoukville</a></span> 
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Stung Treng')}}">Stung Treng</a></span>             
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Svay Rieng')}}">Svay Rieng</a></span>             
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Takeo')}}">Takeo</a></span>             
                    <span class="collapse locationToggler pr-3 py-2"><a href="{{url('quick', 'Tbong Khmum')}}">Tbong Khmum</a></span>             
                </div>
            </div>
        </div>
    </section>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script>
    $(document).ready(function() {
        $('#classification').on('click', function(){
            $(".fa1").toggleClass("angle1");
            var x = document.getElementById("view_classification");
            if (x.innerHTML === "Hide All") {
                x.innerHTML = "View All";
            } else {
                x.innerHTML = "Hide All";
            }
        })
        $('#jobType').on('click', function(){
            $(".fa2").toggleClass("angle2");
            var x = document.getElementById("view_jobType");
            if (x.innerHTML === "Hide All") {
                x.innerHTML = "View All";
            } else {
                x.innerHTML = "Hide All";
            }
        })
        $('#salary').on('click', function(){
            $(".fa3").toggleClass("angle3");
            var x = document.getElementById("view_salary");
            if (x.innerHTML === "Hide All") {
                x.innerHTML = "View All";
            } else {
                x.innerHTML = "Hide All";
            }
        })
        $('#location').on('click', function(){
            $(".fa4").toggleClass("angle4");
            var x = document.getElementById("view_location");
            if (x.innerHTML === "Hide All") {
                x.innerHTML = "View All";
            } else {
                x.innerHTML = "Hide All";
            }
        })
    })
</script>

@endsection
