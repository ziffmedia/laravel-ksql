<?php
namespace ZiffMedia\LaravelKsql;

use Illuminate\Console\Command;
use ZiffMedia\LaravelKsql\KsqlStreamingClient;

class KsqlConsumerCommand extends Command
{
    protected $signature = 'ksql-consumer';
    protected $description = 'Consume KSQL streams and emit events';

    public function handle()
    {
        $client = new KsqlStreamingClient(
            config('ksql.endpoint'),
            config('ksql.auth.username'),
            config('ksql.auth.password')
        );

        foreach (config('ksql.queries') as $name => $query) {
            if (is_array($query))  {
                $query = $query["query"];
                $eventClass = $query["event_class"];
            } else {
                $eventClass = null;
            }
            $client->addQuery($name, $query, $eventClass);
        }
        $client->stream();
    }
}