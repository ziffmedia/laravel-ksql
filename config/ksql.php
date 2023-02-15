<?php

use ZiffMedia\Ksql\Offset;

return [
    'endpoint' => env('KSQL_ENDPOINT'),
    'auth' => [
        'username' => env('KSQL_USERNAME'),
        'password' => env('KSQL_PASSWORD'),
    ],
    'consumer' => [
        'default_offset' => Offset::EARLIEST,
        'queries' => [
            'simple_example' => 'SELECT * FROM foo EMIT CHANGES',
            'custom_event_example' => [
                'query' => 'SELECT * FROM foo EMIT CHANGES',
                'emit' => App\Events\FooChanged::class,
                'offset' => Offset::LATEST,
            ],
        ],
    ],
];
