<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE'),
            'prefix' => env('DB_PREFIX'),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT'),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'unix_socket' => env('DB_SOCKET'),
            'charset' => env('DB_CHARSET'),
            'collation' => env('DB_COLLATION'),
            'prefix' => env('DB_PREFIX'),
            'strict' => env('DB_STRICT_MODE'),
            'engine' => env('DB_ENGINE'),
            'timezone' => env('DB_TIMEZONE'),
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT'),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset' => env('DB_CHARSET'),
            'prefix' => env('DB_PREFIX'),
            'schema' => env('DB_SCHEMA'),
            'sslmode' => env('DB_SSL_MODE'),
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT'),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset' => env('DB_CHARSET'),
            'prefix' => env('DB_PREFIX'),
        ],

        'oracle' => [
            'driver' => 'oracle',
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT'),
            'database' => env('DB_DATABASE'),
            'service_name' => env('DB_SID_ALIAS'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset' => env('DB_CHARSET'),
            'prefix' => env('DB_PREFIX'),
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT'),

        'cluster' => env('REDIS_CLUSTER'),

        'cache_rw' => [
            'host' => env('REDIS_RW_CACHE_HOST'),
            'password' => env('REDIS_RW_CACHE_PASSWORD'),
            'port' => env('REDIS_RW_CACHE_PORT'),
            'database' => env('REDIS_RW_CACHE_DB'),
        ],

        'cache_ro' => [
            'host' => env('REDIS_RO_CACHE_HOST'),
            'password' => env('REDIS_RO_CACHE_PASSWORD'),
            'port' => env('REDIS_RO_CACHE_PORT'),
            'database' => env('REDIS_RO_CACHE_DB'),
        ],

    ],
];
