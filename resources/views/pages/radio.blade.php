@extends('layouts.landing-layout')

@section('title')
	<title>VotePen | Radio</title>
@stop

@section('content')
	<div class="pattern-pattern padding-bottom-3">
		<div class="landing-wrapper">
			<h1>
				Radio | Podcast
			</h1>

			<h2 class="go-gray">
				A podcast all about what it's like running a small web software business. The good, the bad, and the ugly.
			</h2>
		</div>

		<div class="boxes-container">
			<div class="box-item">
				<iframe width="100%" height="120" src="https://www.mixcloud.com/widget/iframe/?hide_cover=1&feed=%2FDJJSTAR%2Fclub-tunes-podcast-001%2F" frameborder="0" ></iframe>
				<div>
					<p>
						PHP is a widely-used open source general-purpose scripting language that is especially suited for web development. It was originally created by Rasmus Lerdorf in 1994, but is now produced by The PHP Development Team.
					</p>
				</div>
			</div>

			<div class="box-item">
				<iframe width="100%" height="120" src="https://www.mixcloud.com/widget/iframe/?hide_cover=1&feed=%2FDJJSTAR%2Fclub-tunes-podcast-001%2F" frameborder="0" ></iframe>
				<div>
					<p>
						Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern.
					</p>

					<p>
						Other than the framework itself, Laravel's warm community has helped us a lot during development.
					</p>
				</div>
			</div>

			<div class="box-item">
				
				<div>
					<p>
						Vue is a progressive framework for building user interfaces. Vue's bleeding fast performance is the main reason VotePen's developer team picked it as our primary JS framework.
					</p>

					<p>
						Vue is going to be huge in 2017, we are happy to be one of the first teams using it on a project at this size.
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection