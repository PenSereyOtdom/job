@extends('layouts.user')

@section('title', 'Career Advise')

@section('content')
@include('layouts.navbar')
<div class="profile container">
    <h4 class="my-4 font-weight-bold">Recently Published by JobNow</h4>
    <div class="row">
        @foreach($career as $careers)   
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="mr-3"><a class="link" href="{{url('/careerAdvisePage' ,$careers->id)}}">
                        @if(isset($careers->title))
                            <p><?php echo $careers->title; ?></p>
                        @else
                        @endif
                        </a></h3>
                    </div>
                    <div class="card-footer">
                        <small class="align-items-end">24/Jan/2020</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <!-- Pagination -->
    <section class="pagination">
    </section>
</div>
@endsection