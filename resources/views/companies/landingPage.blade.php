<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Job Now - @yield('title')</title>

        <!-- css style -->
        <link rel="stylesheet" href="{{asset('css/company.css')}}">
        <!-- icon -->
        <link href="{{asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- google font -->
        <link href="{{asset('https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap')}}" rel="stylesheet">
        <!-- bootstrap -->
        <link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css')}}" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-light bg-recruiter">
            <div class="container py-2">
                <a class="navbar-brand" href="/">
                    <img src="{{asset('img/jobnow_logo_white.svg')}}" alt="Job Now Logo" class="img-fluid">
                    <p class="text-white mb-0"><a class="text-white font-weight-bold" href="/login/company">@lang('company.signin')</a> @lang('company.normal') <a class="text-white font-weight-bold" href="/register/company">@lang('company.register')</a> | <a class="text-white font-weight-bold" href="{{ url('/')}}">@lang('company.jobseeker')</a>
                </a>
            </div>
        </nav>
        <section class="container my-5">
            <div class="row">
                <div class="col-6 my-auto">
                    <h1 class="font-weight-bold">@lang('company.findexperts')</h1>
                    <p>This is overview contect. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Hendrerit ut libero, ut dui volutpat. Lectus eget diam, pulvinar maecenas in est interdum eu duis.</p>
                    <button class="btn btn-primary">@lang('company.getstart')</button>
                </div>
                <div class="col-6 my-auto">
                    <img class="img-fluid" src="img/hero-background.svg" alt="Background">
                </div>
            </div>
        </section>
        <section class="bg-recruiter">
            <div class="container">
                <div class="row">
                    <div class="col-6 my-auto">
                        <img class="img-fluid" src="img/mission-vision.svg" alt="Mission Vision">
                    </div>
                    <div class="col-6 my-auto">
                        <h3 class="font-weight-bold">@lang('company.vision')</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, ut dolor facere velit saepe sint?</p>
                        <h3 class="font-weight-bold">@lang('company.mission')</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, ut dolor facere velit saepe sint?</p>    
                        <button class="btn btn-primary">@lang('company.getstart')</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="container my-5">
            <h3 class="font-weight-bold text-center">@lang('company.commitment')</h3>
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
        <section class="container py-5">
            <h3 class="font-weight-bold text-center">@lang('company.ourservices')</h3>
            <div class="row mt-5 mb-4">
                <div class="col-lg-3 col-md-6 col-sm-6 pb-5">
                    <div class="card p-4">
                        <div class="text-center">
                            <h3 class="font-weight-bold text-trail">@lang('company.trailplan')</h3>
                            <h4 class="font-weight-bold pt-2">$10</h4>
                        </div>
                        <p>@lang('company.benefit') :</p>
                        <p><i class="fa fa-check-circle-o mr-2"></i> @lang('company.normal')</p>
                        <p><i class="fa fa-check-circle-o mr-2"></i> @lang('company.3job')</p>
                        <p><i class="fa fa-check-circle-o mr-2"></i> @lang('company.jobexpiry')</p>
                        <button class="btn btn-trail">@lang('company.buy')</button>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 pb-5">
                    <div class="card p-4">
                        <div class="text-center">
                            <h3 class="font-weight-bold text-basic">@lang('company.basicplan')</h3>
                            <h4 class="font-weight-bold pt-2">$15</h4>
                        </div>
                        <p>@lang('company.benefit') :</p>
                        <p><i class="fa fa-check-circle-o mr-2"></i> @lang('company.normal')</p>
                        <p><i class="fa fa-check-circle-o mr-2"></i> @lang('company.5job')</p>
                        <p><i class="fa fa-check-circle-o mr-2"></i> @lang('company.jobexpiry30')</p>
                        <button class="btn btn-basic">@lang('company.buy')</button>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 pb-5">
                    <div class="card p-4">
                        <div class="text-center">
                            <h3 class="font-weight-bold text-urgent">@lang('company.urgentplan')</h3>
                            <h4 class="font-weight-bold pt-2">$30</h4>
                        </div>
                        <p>Benefits :</p>
                        <p><i class="fa fa-check-circle-o mr-2"></i> @lang('company.urgentpost')</p>
                        <p><i class="fa fa-check-circle-o mr-2"></i> @lang('company.5job')</p>
                        <p><i class="fa fa-check-circle-o mr-2"></i> @lang('company.jobexpiry30')</p>
                        <button class="btn btn-urgent">@lang('company.buy')</button>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 pb-5">
                    <div class="card p-4">
                        <div class="text-center">
                            <h3 class="font-weight-bold text-premium">@lang('company.premiumplan')</h3>
                            <h4 class="font-weight-bold pt-2">$100</h4>
                        </div>
                        <p>Benefits :</p>
                        <p><i class="fa fa-check-circle-o mr-2"></i> @lang('company.normal')</p>
                        <p><i class="fa fa-check-circle-o mr-2"></i> @lang('company.unlimited')</p>
                        <p><i class="fa fa-check-circle-o mr-2"></i> @lang('company.jobexpiry30')</p>
                        <button class="btn btn-primary">@lang('company.buy')</button>
                    </div>
                </div>
            </div>
            <p class="text-center small">@lang('company.noted')</p>
        </section>
        <section class="container py-5">
            <h3 class="font-weight-bold text-center">@lang('company.payment')</h3>
            <div class="row text-center pt-3">
                <div class="col-4">
                    <div class="my-3">
                        <img class="img-fluid rounded-circle" style="width:100px;" src="img/cash-payment.svg" alt="user_female">
                    </div>
                    <h5 class="font-weight-bold">@lang('company.cash')</h5>
                    <p>@lang('company.comeandvisit')</p>
                </div>
                <div class="col-4">
                    <div class="my-3">
                        <img class="img-fluid rounded-circle" style="width:100px;" src="img/bank-payment.svg" alt="user_female">
                    </div>
                    <h5 class="font-weight-bold">ABA Bank</h5>
                    <p>@lang('company.visityournearest')</p>
                </div>
                <div class="col-4">
                    <div class="my-3">
                        <img class="img-fluid rounded-circle" style="width:100px;" src="img/bank-payment.svg" alt="user_female">
                    </div>
                    <h5 class="font-weight-bold">Wing</h5>
                    <p>@lang('company.youdonthavewing')</p>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary">@lang('company.getstart')</button>
            </div>
        </section>
        <footer class="footer bg-recruiter">
            <div class="container p-5">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="mb-5">
                            <img src="{{asset('img/jobnow_logo_white.svg')}}" alt="Job Now Logo" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h6 class="font-weight-bold">@lang('company.phone')</h6>
                        <p class="mb-0">+855 12 000 222</p>
                        <p>+855 12 000 222</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h6 class="font-weight-bold">@lang('company.email')</h6>
                        <p>jobnow@info.com</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h6 class="font-weight-bold">@lang('company.address')</h6>
                        <p>@lang('company.street')</p>
                    </div>
                </div>
                <p class="text-center mb-0">@lang('company.jobnow')</p>
            </div>
        </footer>
    </body>
</html>