@extends('layouts.landing-layout')

@section('title')
    <title>Email Verified | VotePen</title>
@stop

@section('content')
    <div class="container-mid user-select" id="verified-email-page">
        <div class="col-7 align-center">
            {{-- Expired Link --}}
            @if($email_verification->verified_at !== null)
                <h1 class="go-red">
                    <i class="v-icon v-attention"></i> Expired Link
                </h1>

                <p>
                    The email verification link is expired. The email address {{ $email_verification->email }} has already been verified.
                </p>

            {{-- Valid Link --}}
            @else
                <h1 class="go-green">
                    <img src="https://cdn.jsdelivr.net/npm/votepen@19.0.0/imgs/thumbs-up.png" style="width:43px;margin-right:10px"> Yay! Email Verified
                </h1>

                <p>
                    Thanks for verifying {{ $email_verification->email }}. Now we know it's really you!
                </p>
            @endif

            @if(Auth::check())
                <a class="v-button v-button--blue v-button-big margin-top-2" href="/">
                    Home
                </a>
            @else
                <a class="v-button v-button--blue v-button-big margin-top-2" href="/login">
                    Sign in
                </a>
            @endif
        </div>
    </div>
@stop
