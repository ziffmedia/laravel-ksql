<?php

namespace ZiffMedia\LaravelKsql;

use Illuminate\Console\Command;
use ZiffMedia\Ksql\PullQuery;

class FillCommand extends Command
{
    protected $signature = 'ksql:fill {resourceName?} {resourceIds?*}';

    protected $description = 'Consume KSQL entire tables and emit events';

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

        if ($this->argument('resourceIds')) {
            $resourceIds = collect($this->argument('resourceIds'));
        } else {
            $resourceIds = null;
        }

        /** @var KsqlResource $resource */
        foreach ($resources as $resource) {
            $query = new PullQuery($resource->getKsqlFillQuery($resourceIds));
            $client->queryAndEmit($query, $resource->getEventName());
        }
    }
}
