<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Supported: "local", "ftp", "s3", "rackspace"
    |
    */

    'default' => env('DISK_DRIVER', 'public'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    */

    'cloud' => 's3',

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    */

    'disks' => [

        'ftp' => [
            'driver'   => 'ftp',
            'host'     => env('FTP_HOST', '0.0.0.0'),
            'username' => env('FTP_USERNAME', 'username'),
            'password' => env('FTP_PASSWORD', 'password'),
            'port'     => env('FTP_PORT', 22),
            'root'     => env('FTP_ROOT', '/var/www/html/public/uploads/'),
            'passive'  => true,
            'ssl'      => true,
            'timeout'  => 30,
        ],

        'local' => [
            'driver' => 'local',
            'root'   => storage_path('app'),
        ],
        
        'public' => [
            'driver'     => 'local',
            'root'       => storage_path('app/public'),
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key'    => 'your-key',
            'secret' => 'your-secret',
            'region' => 'your-region',
            'bucket' => 'your-bucket',
        ],

    ],

    'cdn_url'      => env('CDN_URL', 'https://cdn.votepen.com/'),

];
