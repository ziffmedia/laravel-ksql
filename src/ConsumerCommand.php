<?php

namespace ZiffMedia\LaravelKsql;

use Illuminate\Console\Command;

class ConsumerCommand extends Command
{
    protected $signature = 'ksql:consume {queryName?}';

    protected $description = 'Consume KSQL streams and emit events';

    public function handle()
    {
        $client = new Client(
            config('ksql.endpoint'),
            config('ksql.auth.username'),
            config('ksql.auth.password')
        );


        $queryConfigs = [];
        if ($queryName = $this->argument('queryName')) {
            $queryConfigs[$queryName] = config('ksql.consumer.queries')[$queryName];
        } else {
            $queryConfigs = config('ksql.consumer.queries');
        }

        $queries = [];
        foreach ($queryConfigs as $name => $query) {
            if (!is_array($query)) {
                $query = [
                    'query' => $query,
                    'emit' => StreamChanged::class,
                    'offset' => config('ksql.consumer.default_offset'),
                ];
            }

            $query['emit'] ??= StreamChanged::class;
            $query['offset'] ??= config('ksql.consumer.default_offset');

            $pq = new PushQuery($name, $query['query'], fn() => null, $query['offset']);
            $pq->eventClass = $query['emit'];
            $queries[] = $pq;
        }

        $client->streamAndEmit($queries);
    }
}
