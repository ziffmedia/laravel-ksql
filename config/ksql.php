<?php

use ZiffMedia\LaravelKsql\DiscoverResources;

return [
    'endpoint' => env('KSQL_ENDPOINT'),
    'auth' => [
        'username' => env('KSQL_USERNAME'),
        'password' => env('KSQL_PASSWORD'),
    ],
    'discover_resources' => DiscoverResources::CONSOLE,
];
