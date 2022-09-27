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

    'default' => __env('DB_CONNECTION'),

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
            'database' => __env('DB_DATABASE'),
            'prefix' => __env('DB_PREFIX'),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => __env('DB_HOST'),
            'port' => __env('DB_PORT'),
            'database' => __env('DB_DATABASE'),
            'username' => __env('DB_USERNAME'),
            'password' => __env('DB_PASSWORD'),
            'unix_socket' => __env('DB_SOCKET'),
            'charset' => __env('DB_CHARSET'),
            'collation' => __env('DB_COLLATION'),
            'prefix' => __env('DB_PREFIX'),
            'strict' => __env('DB_STRICT_MODE'),
            'engine' => __env('DB_ENGINE'),
            'timezone' => __env('DB_TIMEZONE'),
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => __env('DB_HOST'),
            'port' => __env('DB_PORT'),
            'database' => __env('DB_DATABASE'),
            'username' => __env('DB_USERNAME'),
            'password' => __env('DB_PASSWORD'),
            'charset' => __env('DB_CHARSET'),
            'prefix' => __env('DB_PREFIX'),
            'schema' => __env('DB_SCHEMA'),
            'sslmode' => __env('DB_SSL_MODE'),
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => __env('DB_HOST'),
            'port' => __env('DB_PORT'),
            'database' => __env('DB_DATABASE'),
            'username' => __env('DB_USERNAME'),
            'password' => __env('DB_PASSWORD'),
            'charset' => __env('DB_CHARSET'),
            'prefix' => __env('DB_PREFIX'),
        ],

        'oracle' => [
            'driver' => 'oracle',
            'host' => __env('DB_HOST'),
            'port' => __env('DB_PORT'),
            'database' => __env('DB_DATABASE'),
            'service_name' => __env('DB_SID_ALIAS'),
            'username' => __env('DB_USERNAME'),
            'password' => __env('DB_PASSWORD'),
            'charset' => __env('DB_CHARSET'),
            'prefix' => __env('DB_PREFIX'),
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

        'client' => __env('REDIS_CLIENT'),

        'cluster' => __env('REDIS_CLUSTER'),

        'cache_rw' => [
            'host' => __env('REDIS_RW_CACHE_HOST'),
            'password' => __env('REDIS_RW_CACHE_PASSWORD'),
            'port' => __env('REDIS_RW_CACHE_PORT'),
            'database' => __env('REDIS_RW_CACHE_DB'),
        ],

        'cache_ro' => [
            'host' => __env('REDIS_RO_CACHE_HOST'),
            'password' => __env('REDIS_RO_CACHE_PASSWORD'),
            'port' => __env('REDIS_RO_CACHE_PORT'),
            'database' => __env('REDIS_RO_CACHE_DB'),
        ],

    ],
];
