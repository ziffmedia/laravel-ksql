<?php
return [
    "endpoint" => env("KSQL_ENDPOINT"),
    "auth" => [
        "username" => env("KSQL_USERNAME"),
        "password" => env("KSQL_PASSWORD")
    ],
    "queries" => [
        "simple_example" => "SELECT * FROM foo EMIT CHANGES;",
        "custom_event_example" => [
            "query" => "SELECT * FROM foo EMIT CHANGES;",
            "event" => App\Events\FooChanged::class
        ]
    ]
];