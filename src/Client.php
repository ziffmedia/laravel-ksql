<?php

namespace ZiffMedia\LaravelKsql;

use ZiffMedia\Ksql\Client as KsqlClient;
use ZiffMedia\Ksql\PullQuery;
use ZiffMedia\Ksql\ResultRow;

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

        $handler = function (ResultRow $row) {
            event($row->query->event, $row);
        };

        foreach ($query as $q) {
            $q->handler = $handler;
        }
        $this->stream($query);
    }

    public function queryAndEmit(string|PullQuery $query, $event): void
    {
        $results = $this->query($query);
        foreach ($results as $result) {
            event($event, $result);
        }
    }
}
