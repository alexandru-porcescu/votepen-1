<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    */

    'facebook' => [
         'client_id'     => env('FACEBOOK_CLIENT_ID'),
         'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
         'redirect'      => env('FACEBOOK_REDIRECT'),
     ],

    'google' => [
         'client_id'     => env('GOOGLE_CLIENT_ID'),
         'client_secret' => env('GOOGLE_CLIENT_SECRET'),
         'redirect'      => env('GOOGLE_REDIRECT'),
     ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

];
