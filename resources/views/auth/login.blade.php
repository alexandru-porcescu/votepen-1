@extends('layouts.landing-layout')

@section('title')
	<title>Sign in | VotePen</title>
@stop

@section('content')
	<div class="container-mid user-select" style="background: url(https://cdn.jsdelivr.net/npm/votepen@22.0.0/imgs/background.jpg) no-repeat center center fixed;background-size:cover">
		<div class="col-7">
			<div class="social-login-buttons">
		        <a href="/login/google" class="v-button v-button--social-login-page v-button--google">
		            <i class="v-icon v-google"></i>
		            Google
		        </a>
		        <a href="/login/google" class="v-button v-button--social-login-page v-button--facebook">
		            <i class="v-icon v-facebook"></i>
		            Facebook
		        </a>
			</div>

	        <div class="or">
	            - or -
	        </div>

			<div class="v-box align-center">
				<h1 class="title">Sign in with username and password</h1>

				<p>
					Thank you for being a part of VotePen community
				</p>

				<form action="{{ url('/login') }}" method="POST" class="align-left">
					{{ csrf_field() }}

					<div class="form-group">
						<input type="text" class="form-control" id="username" name="username" placeholder="Username..." required>
						@if ($errors->has('username'))
							<small class="text-muted go-red">{{ $errors->first('username') }}</small>
		                @endif
					</div>

					<div class="form-group">
						<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
						@if ($errors->has('password'))
							<small class="text-muted go-red">{{ $errors->first('password') }}</small>
		                @endif
					</div>

					<div class="form-group">
						<div class="checkbox">
							<label><input type="checkbox" name="remember">Remember Me</label>
						</div>
					</div>
					<div class="flex-space">
						<a class="v-button" href="{{ url('/password/reset') }}">Forgot my password</a>
						<button class="v-button v-button--green">Sign In</button>
					</div>
				</form>
			</div>

			<p class="align-center go-white">
				Not a member? Then let's get you <a href="/register">signed up</a>.
			</p>
		</div>
	</div>
@stop