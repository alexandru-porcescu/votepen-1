<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Filename & Format
    |--------------------------------------------------------------------------
    */

    'filename'  => '_ide_helper',
    'format'    => 'php',

    /*
    |--------------------------------------------------------------------------
    | Fluent helpers
    |--------------------------------------------------------------------------
    */

    'include_fluent' => false,

    /*
    |--------------------------------------------------------------------------
    | Write Model Magic methods
    |--------------------------------------------------------------------------
    */

    'write_model_magic_where' => true,

    /*
    |--------------------------------------------------------------------------
    | Helper files to include
    |--------------------------------------------------------------------------
    */

    'include_helpers' => false,

    'helper_files' => [
        base_path().'/vendor/laravel/framework/src/Illuminate/Support/helpers.php',
    ],

    /*
    |--------------------------------------------------------------------------
    | Model locations to include
    |--------------------------------------------------------------------------
    */

    'model_locations' => [
        'app',
    ],

    /*
    |--------------------------------------------------------------------------
    | Extra classes
    |--------------------------------------------------------------------------
    */

    'extra' => [
        'Eloquent' => ['Illuminate\Database\Eloquent\Builder', 'Illuminate\Database\Query\Builder'],
        'Session'  => ['Illuminate\Session\Store'],
    ],

    'magic' => [
        'Log' => [
            'debug'     => 'Monolog\Logger::addDebug',
            'info'      => 'Monolog\Logger::addInfo',
            'notice'    => 'Monolog\Logger::addNotice',
            'warning'   => 'Monolog\Logger::addWarning',
            'error'     => 'Monolog\Logger::addError',
            'critical'  => 'Monolog\Logger::addCritical',
            'alert'     => 'Monolog\Logger::addAlert',
            'emergency' => 'Monolog\Logger::addEmergency',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Interface implementations
    |--------------------------------------------------------------------------
    */

    'interfaces' => [

    ],

    /*
    |--------------------------------------------------------------------------
    | Support for custom DB types
    |--------------------------------------------------------------------------
    */
    'custom_db_types' => [

    ],

    /*
     |--------------------------------------------------------------------------
     | Support for camel cased models
     |--------------------------------------------------------------------------
     */
    'model_camel_case_properties' => false,

    /*
    |--------------------------------------------------------------------------
    | Property Casts
    |--------------------------------------------------------------------------
    */
   'type_overrides' => [
        'integer' => 'int',
        'boolean' => 'bool',
   ],
];
