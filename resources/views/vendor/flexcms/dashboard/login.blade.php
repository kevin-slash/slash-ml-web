@extends('flexcms::layouts.login')

@section('content')	
	<form id="page-login" class="ng-cloak login-area" method="POST" name="loginForm" 
		ng-controller="LoginCtrl"
		ng-submit="submit()">
		
		{{-- <div class="logo-container">			
			<img class="logo" 
				style="width: 220px;"
				src="{{ URL::asset('/img/biz-dimension-logo.png') }}"/>
		</div> --}}
		<div class="logo-container login-title">
			{{ config('flexcms.app.login.name') }} Admin Area
		</div>
		<div class="logo-container login-subtitle">
			{{ config('flexcms.app.login.description') }}
		</div>
		<md-content layout-padding layout="column" layout-sm="column">
		    <md-input-container>
		      	<label>User Email</label>
		      	<input name="username" ng-model="user.email" required>
		    </md-input-container>
		    <md-input-container>
		      	<label>Password</label>
		      	<input name="password" ng-model="user.password" type="password" required>
		    </md-input-container>
		</md-content>
		<input type="hidden" value="{{ csrf_token() }}" name="_token"/>

		<section layout="row" layout-sm="column" layout-align="center center">
      		<md-button type="submit" class="md-raised md-primary">Login</md-button>
    	</section>

	</form>
@stop