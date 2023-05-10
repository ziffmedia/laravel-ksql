<?php

use ZiffMedia\LaravelKsql\DiscoverResources;
use ZiffMedia\Ksql\ContentType;

return [
    'endpoint' => env('KSQL_ENDPOINT'),
    'auth' => [
        'username' => env('KSQL_USERNAME'),
        'password' => env('KSQL_PASSWORD'),
    ],
    'discover_resources' => DiscoverResources::CONSOLE,
    'client_content_type' => ContentType::V1_JSON,
];
