<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Job Now - @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- css style -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <!-- icon -->
        <link href="{{asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- google font -->
        <link href="{{asset('https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap')}}" rel="stylesheet">
        <!-- bootstrap -->
        <link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css')}}" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    
    @yield('content')
    
    @include('layouts.footer')
        
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Add active class to Navbar -->
    <script>
        $( document ).ready(function() {
            var $title = $(document).find("title").text().split("Job Now - ")[1]
            switch($title){
                case 'Home':
                    $("#home").addClass("active");
                    break;
                case 'Jobs':
                    $("#jobs").addClass("active");
                    break;
                case 'Hot Jobs':
                    $("#hotJobs").addClass("active");
                    break;
                case 'Career Advise':
                    $("#careerAdvise").addClass("active");
                    break;
                case 'Profile':
                    $("#profile").addClass("active");
                    break;
                case 'About Us':
                    $("#about").addClass("active");
                    break;
                case 'Contact Us':
                    $("#contact").addClass("active");
                    break;
                default:
                    $("#profile").addClass("active");
                }
            });		
    </script>

    <!-- Add active class to Profile Navbar -->
    <script>    
        $( document ).ready(function() {
            var $title = $(document).find("title").text().split("Job Now - ")[1]   	
            switch($title){
                case 'Profile':
                    $("#myProfile").addClass("active");
                    break;
                case 'CV':
                    $("#cv").addClass("active");
                    break;
                case 'Saved Job':
                    $("#savedJob").addClass("active");
                    break;
                case 'Applied Job':
                    $("#appliedJob").addClass("active");
                    break;
                default:
                    $("#cv").addClass("active");
                }
            });	
    </script>
</html>


