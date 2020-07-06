<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Job Now - Loading</title>
        <style>
            div {display: flex;height: 100vh;align-items: center;justify-content: center;}
            @keyframes arrows {0%,100% {color: black;transform: translateY(0);}50% {color: #3AB493;transform: translateY(20px);}}
            span {--delay: 0s;animation: arrows 1s var(--delay) infinite ease-in;}
        </style>
    </head>
    <body>
        <div>
            <span>↓</span>
            <span style="--delay: 0.1s">↓</span>
            <span style="--delay: 0.3s">↓</span>
            <span style="--delay: 0.4s">↓</span>
            <span style="--delay: 0.5s">↓</span>
        </div>
    </body>
</html>