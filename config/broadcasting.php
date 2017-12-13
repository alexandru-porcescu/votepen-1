<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Broadcaster
    |--------------------------------------------------------------------------
    |
    | Supported: "pusher", "redis", "log", "null"
    |
    */

    'default' => env('BROADCAST_DRIVER', 'pusher'),

    /*
    |--------------------------------------------------------------------------
    | Broadcast service
    |--------------------------------------------------------------------------
    |
    | Supported: "pusher", "echo"
    |
    */

    'service' => env('BROADCAST_SERVICE', 'pusher'),

    /*
    |--------------------------------------------------------------------------
    | Broadcast Connections
    |--------------------------------------------------------------------------
    */

    'connections' => [

        'echo' => [
            'app_address'  => env('ECHO_ADDRESS'),
            'app_id'       => env('ECHO_APP_ID'),
            'auth_key'     => env('ECHO_AUTH_KEY'),
        ],

        'pusher' => [
            'driver'  => 'pusher',
            'key'     => env('PUSHER_KEY'),
            'secret'  => env('PUSHER_SECRET'),
            'app_id'  => env('PUSHER_APP_ID'),
            'options' => [
                'cluster' => env('PUSHER_CLUSTER', 'eu'),
            ],
        ],

        'redis' => [
            'driver'     => 'redis',
            'connection' => 'default',
        ],

        'log' => [
            'driver' => 'log',
        ],

        'null' => [
            'driver' => 'null',
        ],

    ],

];
