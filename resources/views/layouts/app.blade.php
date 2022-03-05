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
      $(document).ready(function(){
       var height = $(window).height();
       var hheight = $(".navbar:visible").height();
       var fheight = $(".footer-outr:visible").height();
       var conheight = height - (hheight+fheight+80);
        $(".outr-cont").css("min-height",conheight);
      });
 </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top header-outr text-center">
            <div class="header-inr">
                <div class="navbar-header header-cont">
                    <!-- Collapsed Hamburger -->
                    <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> -->
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                       <img src="{{ asset(env("LOC_PUBLIC",'').'/img/white-logo.png') }}" class="img-responsive">
                    </a>
                </div>
                <!--<div class="collapse navbar-collapse" id="app-navbar-collapse">

                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                     Right Side Of Navbar -->
                    <!-- <ul class="nav navbar-nav navbar-right">

                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul> -->
                </div>
            </div>
        </nav>
        @yield('content')
        <div class="footer-outr">
                <div class="footer-inr">
                    <div class="footer-cont">
                        <p>Copyright Allo.com 2022. All rights reserved.</p>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>
