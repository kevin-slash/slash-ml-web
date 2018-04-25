<!DOCTYPE html>
<html lang="{{ $lang=='kh'?'km-kh':'en-us' }}">
	<head>

		{{-- html5 and css3 for ie --}}
	    @include('includes.utility.web-meta')

		{{-- html5 and css3 for ie --}}
	    @include('includes.utility.ie-support')

	    <!-- <link href="https://fonts.googleapis.com/css?family=Hanuman|Oswald|Roboto" rel="stylesheet" /> -->

	    @if(App::environment('local'))
			<link href="{{ asset('css/vendors.css') }}" rel="stylesheet">
			<link href="{{ asset('fonts/icomoon-front/style.css') }}" rel="stylesheet">
			<link href="{{ asset('css/style.css') }}" rel="stylesheet">
		@else
			<link href="{{ elixir('css/vendors_mix.css') }}" rel="stylesheet">
			<link href="{{ elixir('css/style.css') }}" rel="stylesheet">
		@endif

	    @section('scripts_top')

	  	@show

	  	<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,600,300i,600i" rel="stylesheet"> -->
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
	</head>

	<body class="no-underline-link no-outline lang_{{ $lang }}">
		

		<header>
			@include("includes.layouts.simple-nav-bar")
		</header>

		<main itemscope >
			@yield('content')
		</main>

		<footer>
			@include("includes.layouts.simple-footer")
		</footer> 

		@if(App::environment('local'))

			<script type="text/javascript" src="{{ asset('vendors/jquery/dist/jquery.js') }}"></script>
			<script type="text/javascript" src="{{ asset('vendors/angular/angular.js') }}"></script>
			<script type="text/javascript" src="{{ asset('vendors/angular-resource/angular-resource.js') }}"></script>
			<script type="text/javascript" src="{{ asset('vendors/angular-material/angular-material.min.js') }}"></script>
			<script src="{{asset('vendors/angular-route/angular-route.min.js')}}"></script>			
			<script type="text/javascript" src="{{ asset('vendors-download/popper/popper.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
			<script src="{{asset('vendors/ng-file-upload/ng-file-upload.min.js')}}"></script>
			<script src="{{asset('vendors/moment/moment.js')}}"></script>
			<script src="{{asset('vendors/chart.js/dist/Chart.js')}}"></script>
			<script src="{{asset('vendors/chart.js/dist/Chart.bundle.js')}}"></script>
			<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
			<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

			<script src="{{asset('vendors/material-angular-paging/build/dist.min.js')}}"></script>
			<script src="{{asset('vendors/ng-file-upload-shim/ng-file-upload-shim.min.js')}}"></script>

			<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/open-source/opensource.js') }}"></script>			

		@else
			<script type="text/javascript" src="{{ elixir('js/build/hh-script.js') }}"  async="true"></script> 
		@endif
		

		@yield('scripts')

	</body>


</html>
