<nav class="navbar navbar-expand-lg navbar-light">
    <div class="wrapper">
        <div class="lang-bar">
            <div class="container">
                <div class=""></div>
                <div class="float-right">
                    <ul class="d-flex mb-0">
                        <li class="nav-item mr-2 active" href="locale/en">
                            <a href="">EN</a>
                        </li>
                        <li class="nav-item">
                            <a href="">KH</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="top-nav">
            <div class="logo"><a href="/"><img src="{{asset('img/jobnow_logo.svg')}}" alt="Job Now Logo" class="img-fluid"></a></div>
            <div class="menu icon" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="line top"></span>
                <span class="line middle"></span>
                <span class="line bottom"></span>
            </div>
            <div class="collapse-jobseeker">
            @if(Auth::check())
                <div class="dropdown show">
                    <a href="#" class="link" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="/profile"><i class="fa fa-user mr-3"></i>@lang('home.myprofile_menu')</a>
                        <a class="dropdown-item" href="/cv"><i class="fa fa-file mr-3"></i>@lang('home.myresume_menu')</a>
                        <a class="dropdown-item" href="/savedJob"><i class="fa fa-star mr-3"></i>@lang('home.savejob_menu')</a>
                        <a class="dropdown-item" href="/appliedJob"><i class="fa fa-check mr-3"></i>@lang('home.applyjob_menu')</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out mr-3"></i>{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <p class="mb-0"><a class="link" href="/login">{{__('home.signin_menu')}}</a> or <a class="link" href="/register">@lang('home.register_menu')</a> | <a class="link" href="{{ url('/recruiter')}}">@lang('home.recruiter_menu')</a></p>
            @endif
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarToggler">
            <div class="bottom-nav">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 justify-content-center">
                    <li class="nav-item jobseeker-dropdown dropdown show">
                        @if(Auth::check())
                        <a class="nav-link w-100 font-weight-bold" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <i class="fa fa-angle-down float-right" aria-hidden="true"></i></a>
                        <div class="dropdown-menu ml-5" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#"><i class="fa fa-file mr-3"></i> CV</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-star mr-3"></i> Saved Jobs</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-check mr-3"></i> Applied Jobs</a>
                        </div>
                        @endif
                    </li>
                    <li id="home" class="nav-item"><a href="/" class="nav-link">@lang('home.home_menu')</a></li>
                    <li id="jobs" class="nav-item"><a href="/jobs" class="nav-link">@lang('home.job_menu')</a></li>
                    <li id="hotJobs" class="nav-item"><a href="/hotJobs" class="nav-link">@lang('home.urgentjob_menu')</a></li>
                    <li id="careerAdvise" class="nav-item"><a href="/careerAdvise" class="nav-link">@lang('home.careeradvise_menu')</a></li>
                    <li id="profile" class="nav-item"><a href="/profile" class="nav-link">@lang('home.myprofile_menu')</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
$(".wrapper").click( function() {
	$(".icon").toggleClass("close");
});
</script>