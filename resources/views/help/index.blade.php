@extends('layouts.guest')


@section('head')
    <title>Help Center - VotePen</title>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Help Center - VotePen" />
    <meta property="og:url" content="{{ config('app.url') }}/help" />
    <meta property="og:site_name" content="VotePen" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@votepen" />
    <meta name="twitter:title" content="Help Center - VotePen" />

    <meta name="description" content="Get instant answers for the most common questions and learn how to take the most out of VotePen."/>
    <meta property="og:description" content="Get instant answers for the most common questions and learn how to take the most out of VotePen." />
    <meta name="twitter:description" content="Get instant answers for the most common questions and learn how to take the most out of VotePen." />
    <meta property="og:image" content="https://cdn.jsdelivr.net/npm/votepen@12.0.0/imgs/votepen-og.png">
    <meta name="twitter:image" content="https://cdn.jsdelivr.net/npm/votepen@12.0.0/imgs/votepen-og.png" />
@stop


@section('content')
    <router-view></router-view>
@endsection


@section('script')
    <script>
        var preload = {
            recentQuestions: {!! $recent_questions !!},
            commonQuestions: {!! $common_questions !!}
        };
    </script>
@endsection