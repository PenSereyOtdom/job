@extends('layouts.user')

@section('title', 'Career Advise')

@section('content')
@include('layouts.navbar')
<div class="blog container py-5">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body p-3">
                    <small>24/Jan/2020</small>
                    <h3 class="card-title my-3"><a href="#">How to Prepare for your interview</a></h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni accusamus quas voluptatibus?
                     Nisi nobis laudantium ut voluptatem ab dicta inventore blanditiis pariatur adipisci recusandae.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni accusamus quas voluptatibus?
                        Nisi nobis laudantium ut voluptatem ab dicta inventore blanditiis pariatur adipisci recusandae.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni accusamus quas voluptatibus?
                        Nisi nobis laudantium ut voluptatem ab dicta inventore blanditiis pariatur adipisci recusandae.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni accusamus quas voluptatibus?
                        Nisi nobis laudantium ut voluptatem ab dicta inventore blanditiis pariatur adipisci recusandae.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni accusamus quas voluptatibus?
                        Nisi nobis laudantium ut voluptatem ab dicta inventore blanditiis pariatur adipisci recusandae.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="related-post">
        <h3 class="font-weight-bold">Related posts</h3>
        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title mb-0"><a href="#">Project One</a></h4>
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
                        <h4 class="card-title mb-0"><a href="#">Project Three</a></h4>
                    </div>
                    <div class="card-footer">
                        <small class="align-items-end">24/Jan/2020</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection