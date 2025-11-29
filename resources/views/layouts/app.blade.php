<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Allo') }}</title>
    <!-- Styles -->
    <link href="{{ asset(env("LOC_PUBLIC",'').'/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset(env("LOC_PUBLIC",'').'/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset(env("LOC_PUBLIC",'').'/js/app.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            var height = window.innerHeight;
            var hheight = document.querySelector(".header-outr").clientHeight;
            var fheight = document.querySelector(".footer-outr").clientHeight;
            var conheight = height - hheight - fheight;
            document.querySelector(".outr-cont").style.minHeight = conheight + 'px';
        });
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top header-outr text-center">
            <div class="header-inr">
                <div class="navbar-header header-cont">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                       <img src="{{ asset(env("LOC_PUBLIC",'').'/img/white-logo.png') }}" class="img-responsive">
                    </a>
                </div>
            </div>
        </nav>
        @yield('content')
        <div class="footer-outr">
            <div class="footer-inr">
                <div class="footer-cont">
                    <p>Copyright Allo.com/DietPi 2025. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
