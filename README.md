# Laravel KSQL
A Laravel-focused client for KsqlDB's REST api. This package is designed to integrate tightly with laravel but does not strictly require it. The core KSQL client only depends on `symfony/http-client`.

### Requirements
* PHP 8.1 or later

### Installation
Install the package via composer:
`composer require ziffmedia/laravel-ksql`

Publish the `ksql.php` config file: ` php artisan vendor:publish --provider "ZiffMedia\LaravelKsql\KsqlServiceProvider"`

## Usage

**Construct a basic KSQL client by hand:**
```php
$client = new Ziffmedia\LaravelKsql\Client("http://my.ksqldb.server:8088");
```

**Construct a basic KSQL client by hand, with HTTP basic authentication:**
```php
$client = new Ziffmedia\LaravelKsql\Client("http://my.ksqldb.server:8088", "myusername", "mypassword");
```
*Note: if using Confluent Cloud, the username and password should be a KSQL api key and api secret, respectively.*

**Use the Laravel DI container to factory a client based on config values:**

```php
$client = app(ZiffMedia\LaravelKsql\KsqlClient::class)
```

### Config file and environment variables
```php
<?php
return [
    "endpoint" => env("KSQL_ENDPOINT"),
    "auth" => [
        "username" => env("KSQL_USERNAME"),
        "password" => env("KSQL_PASSWORD")
    ],
    "consumer_queries" => [ // examples included, but this block is only necessary if using the consumer command
        "simple_example" => "SELECT * FROM foo EMIT CHANGES;",
        "custom_event_example" => [
            "query" => "SELECT * FROM foo EMIT CHANGES;",
            "event" => App\Events\FooChanged::class
        ]
    ]
];
```

### The KsqlQueryResult Class
All queries (streaming or otherwise) will return an instance of `Ziffmedia\LaravelKsql\Ksql\QueryResult`. This class is a value object that contains the following public properies:
```php
class QueryResult
{
    public string $query; // the sql string used to produce this result
    public array $columns; // an associative array keyed by column names in the result, with values equal to the data type for that column
    public string|null $name; // the convenience name key used for this query. Value will be null unless this result was produced from multiplexing
    public array $data; // an associative array of column name to column value. This will represent one row of a results data set.
}
```

### The KsqlStreamChanged Event
This class is a Laravel-native event. It contains one public property, which is the QueryResult object that caused that event to be emitted. You can listen to this event in your Laravel application, and add business logic based on the contents of the `QueryResult`. For more granular control, you can subclass this event to enable queueing and more control over discrete listening for result types when multiplexing or using the `ksql-consumer` command. Any method that allows emitting of events in the client will take an optional classname to use for the event emitted.
```php 
class KsqlStreamChanged
{
    public QueryResult $result;
}
```

### Non-streaming queries
```php
$client = new Ziffmedia\LaravelKsql\Client("http://my.ksqldb.server:8088");

// full synchronous query returning an array of QueryResult objects
/** @var QueryResult[] $result */
$result = $client->query("SELECT * FROM MYTABLE LIMIT 5");

// use an optional row handler
$client->query("SELECT * FROM MYTABLE LIMIT 5", function(QueryResult $row) {
    dump($row);
})

// emit events using the built-in event class
$client->query("SELECT * FROM MYTABLE LIMIT 5", true);

// emit events using a custom event class
$client->query("SELECT * FROM MYTABLE LIMIT 5", App\Event\MyTableChanged::class);
```

### Streaming queries
Querying a single stream (query ends in "EMIT CHANGES") has the same basic functionality as the `->query()` method, with the exception that the `->stream()` method is intended to be used exclusively in a command-line context for a long-running process. `->stream()` will not return unless it is either disconnected at the network level or receives an EOF from the KsqlDB HTTP server.

```php
$client = new Ziffmedia\LaravelKsql\Client("http://my.ksqldb.server:8088");

// emit events using the built-in event class
$client->stream("SELECT * FROM MYTABLE EMIT CHANGES");

// use an optional row handler
$client->stream("SELECT * FROM MYTABLE EMIT CHANGES", function(QueryResult $row) {
    dump($row);
})

// emit events using a custom event class
$client->stream("SELECT * FROM MYTABLE EMIT CHANGES", App\Event\MyTableChanged::class);
```

### Multiplexing multiple streaming queries
You'll often want to actually use HTTP/2 connection pooling to multiplex multiple streaming queries at once. Use the `->multiplex()` method to return a stream multiplexer object, which can be "built up" with multiple query calls, before calling `->sream()` to start streaming.

For multiplexed queries, each `->query()` call supports the same options as a single stream query, including event emitting events, using callable row handlers, etc. Each call to `->query()` has an additional leading argument that is a "name key" for that query. This is used both internally to identify which stream data is coming from and also returned back to your in `QueryResult` instances.
```php
$client = new Ziffmedia\LaravelKsql\Client("http://my.ksqldb.server:8088");

$client->multiplex()
       ->query('mytable', "SELECT * FROM MYTABLE EMIT CHANGES")
       ->query('yourtable', 'SELECT * FROM YOURTABLE EMIT CHANGES')
       ->stream();
```

### Using the built-in consumer command
This package provides a convenience `artisan` command that can read your `config/ksql.php` for a list of stream queries to multiple and emit events to your application. This encompasses a common use case of needing to query a stream and have a hook to perform application logic as that stream changes. Simple create an event listener in your Laravel app and run `artisan ksql-consumer` and your listener will be triggered as data flows through the KSQL streams (or tables). 

```bash
$> php artisan ksql-consumer
```

The config file syntax also provides a facility to specify custom event classes per-query, though it does not allow for the use of a callable row handler. If you require a row handler instead of an event listener (uncommon), you'll need to use the above client examples to create your own tooling.

