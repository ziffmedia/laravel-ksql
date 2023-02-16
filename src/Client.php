<?php

namespace ZiffMedia\LaravelKsql;

use Illuminate\Foundation\Bus\Dispatchable;
use ZiffMedia\Ksql\Client as KsqlClient;
use ZiffMedia\Ksql\PushQueryRow;

class Client extends KsqlClient
{
    /**
     * @param  PushQuery[]|PushQuery  $query
     */
    public function streamAndEmit(array|PushQuery $query): void
    {
        if (! is_array($query)) {
            $query = [$query];
        }
        foreach ($query as $q) {
            $q->handler = function (PushQueryRow $row) {
                event($row->query->eventClass, $row);
            };
        }
        $this->stream($query);
    }

    public function queryAndEmit(string $query, string $eventClass = QueryResultReceived::class): void
    {
        $results = $this->query($query);
        foreach ($results as $result) {
            event($eventClass, $results->schema, $result);
        }
    }
}
