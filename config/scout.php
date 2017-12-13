<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Search Engine
    |--------------------------------------------------------------------------
    |
    | Supported: "algolia", "elasticsearch", "null"
    |
    */

    'driver' => env('SCOUT_DRIVER', 'algolia'),

    /*
    |--------------------------------------------------------------------------
    | Index Prefix
    |--------------------------------------------------------------------------
    */

    'prefix' => env('SCOUT_PREFIX', ''),

    /*
    |--------------------------------------------------------------------------
    | Queue Data Syncing
    |--------------------------------------------------------------------------
    */

    // 'queue' => true,
    'queue' => env('SCOUT_QUEUE', '0') == '1' ? true : false,

    /*
    |--------------------------------------------------------------------------
    | Algolia Configuration
    |--------------------------------------------------------------------------
    */

    'algolia' => [
        'id'     => env('ALGOLIA_APP_ID', ''),
        'secret' => env('ALGOLIA_SECRET', ''),
    ],

    /*
    |--------------------------------------------------------------------------
    | MySQL Driver
    |--------------------------------------------------------------------------
    */

    'mysql' => [
        'mode'                         => 'NATURAL_LANGUAGE',
        'model_directories'            => [app_path()],
        'min_search_length'            => 0,
        'min_fulltext_search_length'   => 6,
        'min_fulltext_search_fallback' => 'LIKE',
        'query_expansion'              => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Elasticsearch Configuration
    |--------------------------------------------------------------------------
    */

    'elasticsearch' => [
        'index' => env('ELASTICSEARCH_INDEX', 'votepen'),

        'config' => [
            'hosts' => [
                env('ELASTICSEARCH_HOST', 'http://localhost'),
            ],
        ],
    ],

];
