@extends('layouts.guest')


@section('head')
    <title>{{ $help->title }} - VotePen</title>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $help->title }} - VotePen" />
    <meta property="og:url" content="{{ config('app.url') }}/help/{{ $help->id }}" />
    <meta property="og:site_name" content="VotePen" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@votepen" />
    <meta name="twitter:title" content="{{ $help->title }} - VotePen" />

    <meta name="description" content="{{ $help->body }}"/>
    <meta property="og:description" content="{{ $help->body }}" />
    <meta name="twitter:description" content="{{ $help->body }}" />
    <meta property="og:image" content="https://cdn.jsdelivr.net/npm/votepen@12.0.0/imgs/votepen-og.png">
    <meta name="twitter:image" content="https://cdn.jsdelivr.net/npm/votepen@12.0.0/imgs/votepen-og.png" />
@stop


@section('content')
    <router-view></router-view>
@endsection


@section('script')
    <script>
        var preload = {
            help: {!! $help !!}
        };
    </script>
@endsection