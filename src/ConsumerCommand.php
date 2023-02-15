<?php

namespace ZiffMedia\LaravelKsql;

use Illuminate\Console\Command;

/**
 * 'consumer' => [
'default_offset' => Offset::EARLIEST,
'queries' => [
'simple_example' => 'SELECT * FROM foo EMIT CHANGES',
'custom_event_example' => [
'query' => 'SELECT * FROM foo EMIT CHANGES',
'emit' => App\Events\FooChanged::class,
'offset' => Offset::LATEST,
]
],
],
 */
class ConsumerCommand extends Command
{
    protected $signature = 'ksql-consumer';

    protected $description = 'Consume KSQL streams and emit events';

    public function handle()
    {
        $client = new Client(
            config('ksql.endpoint'),
            config('ksql.auth.username'),
            config('ksql.auth.password')
        );

        $queries = [];
        foreach (config('ksql.consumer.queries') as $name => $query) {
            if (! is_array($query)) {
                $query = [
                    'query' => $query,
                    'emit' => StreamChanged::class,
                    'offset' => config('ksql.consumer.default_offset'),
                ];
            }

            $query['emit'] ??= StreamChanged::class;
            $query['offset'] ??= config('ksql.consumer.default_offset');

            $pq = new PushQuery($name, $query['query'], fn () => null, $query['offset']);
            $pq->eventClass = $query['emit'];
            $queries[] = $pq;
        }
        $client->streamAndEmit($queries);
    }
}
