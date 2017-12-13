<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#fff">
    <link rel="icon" sizes="192x192" href="http://i1.wp.com/cdn.jsdelivr.net/npm/votepen@18.0.0/logo.png?w=192">

    @yield('title')
    @yield('head')

    <meta property="og:locale" content="en_US" />
    <meta property="og:site_name" content="votepen.com" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,700" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.5/socket.io.min.js"></script>
    <link href="/icons/css/fontello.7.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'env' => config('app.env')
        ]); ?>
    </script>

    <link rel="shortcut icon" href="https://cdn.jsdelivr.net/npm/votepen@12.0.0/imgs/favicon.png">
</head>
<body>
@include('google-analytics')
	<div id="landing">


		<div class="header user-select">
			<div class="logo">
				<a href="/">
					<img src="https://cdn.jsdelivr.net/npm/votepen@12.0.0/imgs/votepen-logo.png" alt="votepen.com">
					VotePen
				</a>
			</div>

			<div class="right-menu">
				<a href="https://medium.com/votepen" target="_blank" class="item desktop-only">
					<img src="https://cdn.jsdelivr.net/npm/votepen@13.0.0/landing/medium.png" style="width:18px;margin-right:8px">
					Blog
				</a>
				<a href="/radio" class="item desktop-only">
					<img src="https://cdn.jsdelivr.net/npm/votepen@13.0.0/landing/podcast.svg" style="width:16px;margin-right:8px">
					Podcast
				</a>
				<a href="/credits" class="item desktop-only">
					<img src="https://cdn.jsdelivr.net/npm/votepen@13.0.0/landing/coin.svg" style="width:18px;margin-right:8px">
					Credits
				</a>

				@if(Auth::check())
					<a href="{{'/@' . Auth::user()->username }}" class="v-button v-button--green">
			            {{ Auth::user()->username }}
			        </a>
				@else
					<a href="/login" class="v-button v-button--red">
			            Sign in
			        </a>
				@endif

			</div>

		</div>


		@yield('content')


		<footer class="user-select">
			<div class="flex1">
				<h3 class="go-primary">VotePen 	&#10084;</h3>
				<ul>
					<li><a href="/about">About</a></li>

					@if(Auth::check())
						<li><a href="/logout">Sign out</a></li>
					@else
						<li><a href="/register">Sign Up</a></li>
					@endif

					<li><a href="/tos">Terms of Service</a></li>
					<li><a href="/privacy-policy">Privacy Policy</a></li>
				</ul>
			</div>
			<div class="flex1">
				<h3 class="go-red">Get to know VotePen </h3>
				<ul>
					<li><a href="/radio">Radio | Podcast</a></li>
					<li><a href="/credits">Credits</a></li>
					<li><a href="/help">Help Center</a></li>
					<li><a href="https://stats.uptimerobot.com/jZDKmIREm">Status</a></li>
				</ul>
			</div>
			<div class="flex1">
				<h3 class="go-green">Social</h3>
				<ul>
					<li><a href="https://medium.com/votepen" target="_blank">Blog</a></li>
					<li><a href="https://gitlab.com/VotePen" target="_blank">GitLab</a></li>
					<li><a href="https://twitter.com/votepen/" target="_blank">Twitter</a></li>
					<li><a href="https://facebook.com/votepen.com/" target="_blank">Facebook</a></li>
				</ul>
			</div>
		</footer>
    </div>
	<style>
		.landing-logos {
			width: 3%;
		    margin-bottom: 6px;
		    margin-left: 6px;
		}
	</style>
	<script src="{{ mix('/js/manifest.js') }}"></script>
	<script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('js/landing.js') }}"></script>
    @yield('script')
</body>
</html>