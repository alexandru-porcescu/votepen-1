<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
    	@section('title')
    		Backend | VotePen
    	@show
    </title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.5/socket.io.min.js"></script>


    @yield('head')
        <link href="/icons/css/fontello.6.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.5.0/css/bulma.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ mix('/css/admin.css') }}">
    @include('user.user-style')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        window.Laravel = @json([
            'csrfToken' => csrf_token(),
            'env' => config('app.env'),
            'pusherKey' => config('broadcasting.connections.pusher.key'),
            'pusherCluster' => config('broadcasting.connections.pusher.options.cluster'),
        ])
    </script>

    <link rel="shortcut icon" href="https://cdn.jsdelivr.net/npm/votepen@12.0.0/imgs/favicon.png">
</head>

<body>

<div id="backend">
    @include('backend.header')

    @include('backend.messages')

    @yield('content')
</div>

@include('php-to-js-data')

<script src="{{ mix('/js/manifest.js') }}"></script>
<script src="{{ mix('/js/vendor.js') }}"></script>
<script src="{{ mix('/js/backend.js') }}"></script>

</body>
</html>
