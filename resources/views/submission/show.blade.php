@extends('layouts.guest')


@section('head')
	<title>{{ $submission->title }} - VotePen</title>
	<meta property="og:type" content="article" />
	<meta property="og:title" content="{{ $submission->title }} - VotePen" />
	<meta property="og:url" content="{{ config('app.url') }}/c/{{ $submission->category_name }}/{{ $submission->slug }}" />
	<meta property="og:site_name" content="VotePen" />

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@votepen" />
	<meta name="twitter:title" content="{{ $submission->title }} - VotePen" />

	@if ($submission->type == "text")
		<meta name="description" content="{{ $submission->data['text'] }}"/>
		<meta property="og:description" content="{{ $submission->data['text'] }}" />
		<meta name="twitter:description" content="{{ $submission->data['text'] }}" />
		<meta property="og:image" content="https://cdn.jsdelivr.net/npm/votepen@12.0.0/imgs/votepen-og.png">
		<meta name="twitter:image" content="https://cdn.jsdelivr.net/npm/votepen@12.0.0/imgs/votepen-og.png" />
	@else
		<meta property="og:image" content="{{ $submission->data['thumbnail'] ?? $submission->data['path'] ?? 'https://cdn.jsdelivr.net/npm/votepen@12.0.0/imgs/votepen-og.png' }}" />
		<meta name="twitter:image" content="{{ $submission->data['thumbnail'] ?? $submission->data['path'] ?? 'https://cdn.jsdelivr.net/npm/votepen@12.0.0/imgs/votepen-og.png' }}" />
	@endif
@stop


@section('content')
	<router-view></router-view>
@endsection


@section('script')
	<script>
		var preload = {
			submission: {!! $submission !!}
		};
	</script>
@endsection