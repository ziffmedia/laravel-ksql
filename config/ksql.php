<?php

use ZiffMedia\Ksql\ContentType;
use ZiffMedia\LaravelKsql\DiscoverResources;

return [
    'endpoint' => env('KSQL_ENDPOINT'),
    'auth' => [
        'username' => env('KSQL_USERNAME'),
        'password' => env('KSQL_PASSWORD'),
    ],
    'discover_resources' => DiscoverResources::CONSOLE,
    'client_content_type' => ContentType::V1_JSON,
];
