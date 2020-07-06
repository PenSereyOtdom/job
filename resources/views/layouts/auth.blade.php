<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Job Now - @yield('title')</title>

        <!-- css style -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <!-- icon -->
        <link href="{{asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- google font -->
        <link href="{{asset('https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap')}}" rel="stylesheet">
        <!-- bootstrap -->
        <link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css')}}" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <style>
            body {background-image: url({{url('img/recruiter-login.jpg')}}); background-size: cover; }
            .brand-wrapper {margin-bottom: 19px; }
            .brand-wrapper .logo {height: 50px; }
            .login-card {border: 0;border-radius: 27.5px; box-shadow: 0 10px 30px 0 rgba(172, 168, 168, 0.43); overflow: hidden;}
            .img-login{background: #04385D; opacity: 0.9;}
            .login-center{margin: 50% 0%;}
            .login-card .card-body {padding: 85px 60px 60px; }
            @media (max-width: 422px) {.login-card .card-body {padding: 35px 24px; } }
            .login-card-description {color: #000;font-weight: bold;margin-bottom: 23px; }
            .login-card .login-btn { padding: 13px 20px 12px; background-color: #000;border-radius: 4px; font-size: 17px; font-weight: bold; line-height: 20px; color: #fff;margin-bottom: 24px; }
            .login-card .login-btn:hover {border: 1px solid #000;background-color: transparent;color: #000; }
            .login-card .forgot-password-link {font-size: 14px;color: #919aa3;margin-bottom: 12px; }
            .login-card-footer-text { font-size: 16px; color: #0d2366;margin-bottom: 60px; }
            @media (max-width: 767px) {.login-card-footer-text {margin-bottom: 24px; } }
            .login-card-footer-nav a {font-size: 14px;color: #919aa3; }
        </style>
    </head>
    <body>
        @yield('content')

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>