<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ asset(env("LOC_PUBLIC",'').'/css/app.css') }}">
	<link rel="stylesheet" href="{{ asset(env("LOC_PUBLIC",'').'/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset(env("LOC_PUBLIC",'').'/css/font-awesome.min.css') }}">
	<script type="text/javascript" src="{{ asset(env("LOC_PUBLIC",'').'/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset(env("LOC_PUBLIC",'').'/js/jquery-asRange.js') }}"></script>
	<script type="text/javascript" src="{{ asset(env("LOC_PUBLIC",'').'/js/jquery.validate.js') }}"></script>
	<script type="text/javascript" src="{{ asset(env("LOC_PUBLIC",'').'/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset(env("LOC_PUBLIC",'').'/js/naoTooltips.js') }}"></script>
	<script>
        document.addEventListener("DOMContentLoaded", function(){
            var height = window.innerHeight;
            var hheight = document.querySelector(".header-outr").clientHeight;
            var fheight = document.querySelector(".footer-outr").clientHeight;
            var conheight = height - hheight - fheight;
            document.querySelector(".outr-cont").style.minHeight = conheight + 'px';
        });
        </script>
 	<style type="text/css">
	  	#overlay{
	  		position: fixed;
	  		z-index: 99999;
	  		top: 0;
	  		left: 0;
	  		bottom: 0;
	  		right: 0;
	  		text-align: center;
	  		display: none;
	  		background: rgba(0,0,0,0.8);
	  		transition: 1s 0.4s;
	  	}
	  	.load_img{
	  		position: absolute;
	  		top: 50%;
	  		transform: translate(-50%, -50%);
	  		left: 50%;
	  		width: 6%;
	  		z-index: 999;
	  	}
	</style>
</head>
<body>
@include('partials.header')
<div id="overlay">
	<img class="load_img" src="{{asset('img/loading.gif')}}" >
</div>
<div class="outr-cont">
	<div class="container">
        @yield('content')
	</div>
</div>
<div class="footer-outr">
	<div class="footer-inr">
		<div class="footer-cont">
			<p>Copyright Allo.com 2022. All rights reserved.</p>
		</div>
	</div>
</div>
</body>
</html>