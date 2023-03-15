<?php

namespace ZiffMedia\LaravelKsql;

use Illuminate\Console\Command;

class ConsumerCommand extends Command
{
    protected $signature = 'ksql:consume {resourceName?}';

    protected $description = 'Consume KSQL streams and emit events';

    public function handle()
    {
        $client = new Client(
            config('ksql.endpoint'),
            config('ksql.auth.username'),
            config('ksql.auth.password')
        );

        $resourceManager = app(ResourceManager::class);
        if ($resourceName = $this->argument('resourceName')) {
            $resources = [$resourceManager->$resourceName];
        } else {
            $resources = $resourceManager;
        }

        /** @var KsqlResource $resource */
        foreach ($resources as $resource) {
            if ($resource->shouldConsume && $resource->catchUpBeforeConsume) {

            }
        }



        $queries = [];
        foreach ($queryConfigs as $name => $query) {
            if (! is_array($query)) {
                $query = [
                    'query' => $query,
                    'emit' => KsqlChanged::class,
                    'offset' => config('ksql.consumer.default_offset'),
                ];
            }

            $query['emit'] ??= KsqlChanged::class;
            $query['offset'] ??= config('ksql.consumer.default_offset');

            $pq = new PushQuery($name, $query['query'], fn () => null, $query['offset']);
            $pq->eventClass = $query['emit'];
            $queries[] = $pq;
        }

        $client->streamAndEmit($queries);
    }

}
