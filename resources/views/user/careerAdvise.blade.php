@extends('layouts.user')

@section('title', 'Career Advise')

@section('content')
@include('layouts.navbar')
<div class="container">
    <h4 class="my-4 font-weight-bold">Recently Published by JobNow</h4>
    <div class="row">
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="/careerAdvisePage"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title mb-0"><a href="/careerAdvisePage">Project One</a></h4>
                </div>
                <div class="card-footer">
                    <small class="align-items-end">24/Jan/2020</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="/careerAdvisePage"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title mb-0"><a href="/careerAdvisePage">Project Two</a></h4>
                </div>
                <div class="card-footer">
                    <small class="align-items-end">24/Jan/2020</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="/careerAdvisePage"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title mb-0"><a href="/careerAdvisePage">Project Two</a></h4>
                </div>
                <div class="card-footer">
                    <small class="align-items-end">24/Jan/2020</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title mb-0"><a href="#">Project Two</a></h4>
                </div>
                <div class="card-footer">
                    <small class="align-items-end">24/Jan/2020</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title mb-0"><a href="#">Project Two</a></h4>
                </div>
                <div class="card-footer">
                    <small class="align-items-end">24/Jan/2020</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title mb-0"><a href="#">Project Two</a></h4>
                </div>
                <div class="card-footer">
                    <small class="align-items-end">24/Jan/2020</small>
                </div>
            </div>
        </div>
    </div>
    <!-- Pagination -->
    <section class="pagination">
    </section>
</div>
@endsection