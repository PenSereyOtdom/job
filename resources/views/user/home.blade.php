@extends('layouts.user')

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
                    @else
                        <span class="pr-3 py-2"><a href="">View all</a></span>
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
                    @else
                        <span class="pr-3 py-2"><a href="">View all</a></span>
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
                    @else 
                        <span class="pr-3 py-2"><a href="">View all</a></span>
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
                    <span class="pr-3 py-2"><a href="{{url('quick', 'Phnom Penh')}}">Phnom Penh</a></span>
                    <span class="pr-3 py-2"><a href="{{url('quick', 'Phnom Penh')}}">Phnom Penh</a></span>
                    <span class="pr-3 py-2"><a href="{{url('quick', 'Phnom Penh')}}">Phnom Penh</a></span>
                    <span class="pr-3 py-2"><a href="{{url('quick', 'Phnom Penh')}}">Phnom Penh</a></span>
                    <span class="pr-3 py-2"><a href="{{url('quick', 'Phnom Penh')}}">View all</a></span>
                </div>
            </div>
        </div>
    </section>
@endsection
