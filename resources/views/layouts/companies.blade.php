 <!doctype html>
<html>
    <head>
    <title>Job Now - @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- css style -->
        <link rel="stylesheet" href="{{asset('css/company.css')}}">
        <link rel="stylesheet" href="{{asset('css/custom-style.css')}}">
        <!-- icon -->
        <link rel="stylesheet" href="{{URL::to('https://use.fontawesome.com/releases/v5.7.2/css/all.css')}}" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- google font -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <!-- bootstrap -->
        <link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css')}}" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    </head>

    <body>
        <div class="page">
            <!-- Main Navbar-->
            <header class="header">
                <nav class="navbar">
                    <div class="container-fluid">
                        <div class="navbar-holder d-flex align-items-center justify-content-between">            
         
                            <!-- Navbar Header-->
                            <div class="navbar-header">
                                <div class="logo"><img src="{{asset('img/jobnow_logo_white.svg')}}" alt="Job Now Logo"></div>                        
                            </div>
                            <div class="menu icon" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="line top"></span>
                                <span class="line middle"></span>
                                <span class="line bottom"></span>
                            </div>
                            <div class="nav-group-right">
                                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                                    <!-- Notifications-->
                                    <li class="nav-item dropdown"> 
                                        <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                                            <i class="far fa-bell"></i>
                                            <!--show red badge-->
                                            @if(count(auth()->guard('company')->user()->unreadNotifications))
                                                <span class="badge bg-red badge-corner">{{count(auth()->guard('company')->user()->unreadNotifications)}}</span>
                                            @endif
                                        </a>
                                        <ul aria-labelledby="notifications" class="dropdown-menu">
                                            @forelse (auth()->guard('company')->user()->unreadNotifications as $notification)
                                                <a href="/appliedCandidate">
                                                    <li class="dropdown-item">
                                                        @include('notifications.notification')
                                                    </li>
                                                </a> 
                                                @empty
                                                <li class="text-center">No new notifications</li>
                                            @endforelse
                                        </ul>
                                    </li>
                                    <!-- Language Switch -->
                                    <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="{{asset('img/english.png')}}" alt="English" class="lang-flag"><span class="d-none d-sm-inline-block">English</span></a>
                                        <ul aria-labelledby="languages" class="dropdown-menu">
                                            <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="{{asset('img/khmer.png')}}" alt="Khmer" class="lang-flag mr-2">Khmer</a></li>
                                        </ul>
                                    </li>
                                    <!-- Logout -->
                                    <li class="nav-item dropdown logout">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::guard('company')->user()->name }} <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <div class="nav-col collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav mr-auto justify-content-center">
                    <li class="nav-item"><a class="nav-link" href="{{url('company')}}"> <i class="fa fa-home mr-2"></i>{{ __('Home') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('jobPost')}}"><i class="far fa-file-alt mr-2"></i>{{ __('Job Management') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('appliedCandidate')}}"><i class="fas fa-user-check mr-2"></i>{{ __('Applied Candidates') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('serviceListing')}}"><i class="far fa-check-circle mr-2"></i>{{ __('Our Services') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('payment')}}"><i class="far fa-credit-card mr-2"></i>{{ __('Payment Methods') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('whyUs')}}"><i class="far fa-lightbulb mr-2"></i></i>{{ __('Why Us?') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('company/setting')}}"><i class="fa fa-cog mr-2"></i>{{ __('Setting') }}</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-side-nav').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Logout') }}
                        </a>
                        <form id="logout-side-nav" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>

            <div class="page-content d-flex align-items-stretch"> 
                <!-- Side Navbar -->
                <nav class="side-navbar">
                    <!-- Sidebar Header-->
                    <div class="sidebar-header d-flex align-items-center">
                        <div class="picture-container">
                            <div class="nav-picture">
                                @if( Auth::guard('company')->user()->company_profile )
                                    <img src="{{ asset('storage/company_profile/' . Auth::guard('company')->user()->company_profile) }}" class="picture-src" id="wizardPicturePreview" title="">
                                @else
                                    <img src="{{asset('/img/user_company.jpg')}}" class="picture-src" id="wizardPicturePreview" title="">
                                @endif
                            </div>
                        </div>

                        <div class="title">
                            <h5 class="font-weight-bold">{{ Auth::guard('company')->user()->name }}</h5>
                        </div>
                    </div>
                    
                    <!-- Sidebar Navidation Menus-->
                    <ul class="list-unstyled">
                        <li id="home"><a href="{{url('company')}}"> <i class="fa fa-home"></i>{{ __('Home') }}</a></li>
                        <li id="job_management"><a href="{{url('jobPost')}}"><i class="far fa-file-alt"></i>{{ __('Job Management') }}</a></li>
                        <li id="applied_candidates"><a href="{{url('appliedCandidate')}}"><i class="fas fa-user-check"></i>{{ __('Applied Candidates') }}</a></li>
                        <li id="our_services"><a href="{{url('serviceListing')}}"><i class="far fa-check-circle"></i>{{ __('Our Services') }}</a></li>
                        <li id="payment_methods"><a href="{{url('payment')}}"><i class="far fa-credit-card"></i>{{ __('Payment Methods') }}</a></li>
                        <li id="why_us"><a href="{{url('whyUs')}}"><i class="far fa-lightbulb"></i></i>{{ __('Why Us?') }}</a></li>
                        <li id="setting"><a href="{{url('company/setting')}}"><i class="fa fa-cog"></i>{{ __('Setting') }}</a></li>
                        <li id="log_out">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-side-nav').submit();">
                                <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
                            </a>
                            <form id="logout-side-nav" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                <div class="content-inner ml-auto">
                    <header class="page-header py-3 mb-5 px-5">
                        <h4 class="font-weight-bold mb-0">@yield('header')</h4>
                    </header>
                    @yield('content')
                    <!-- Page Footer-->
                    <footer class="main-footer">
                        <div class="copyright text-center">
                            <p>© JOBNOW. All rights reserved.</p>
                        </div>
                    </footer>
                </div>
            </div>
        </div>


        <!-- Ck Editor -->
        <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- JavaScript files-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>        

        <script type="text/javascript">
        $(".menu").click( function() {
            $(".icon").toggleClass("close");
        });
        </script>
        <!-- Add Active Class-->
        <script>
            $( document ).ready(function() {
                var $title = $(document).find("title").text().split("Job Now - ")[1]
                switch($title){
                    case 'Job Management':
                        $("#job_management").addClass("active");
                        break;
                    case 'Applied Candidates':
                        $("#applied_candidates").addClass("active");
                        break;
                    case 'Our Services':
                        $("#our_services").addClass("active");
                        break;
                    case 'Payment Methods':
                        $("#payment_methods").addClass("active");
                        break;
                    case 'Why Us':
                        $("#why_us").addClass("active");
                        break;
                    case 'Setting':
                        $("#setting").addClass("active");
                        break;
                    default:
                        $("#home").addClass("active");
                }
            });
        </script>
    </body>
</html>