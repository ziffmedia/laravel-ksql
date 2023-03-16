<?php

namespace ZiffMedia\LaravelKsql;

use ZiffMedia\Ksql\PushQuery as KsqlPushQuery;

class PushQuery extends KsqlPushQuery
{
    public string $event;
}
