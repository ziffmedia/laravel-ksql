<?php

namespace ZiffMedia\LaravelKsql;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use ZiffMedia\Ksql\Offset;
use ZiffMedia\Ksql\PullQuery;
use ZiffMedia\Ksql\PushQueryRow;
use ZiffMedia\Ksql\ResultRow;

class KsqlResource
{
    public string $ksqlTable;

    public string $ksqlUpdatedField = 'updated_at';

    public bool $catchUpBeforeConsume = false;

    public bool $shouldConsume = true;

    public ?string $model;

    public Offset $offset = Offset::LATEST;

    public function handle(ResultRow $data)
    {
    }

    public function getKsqlStreamQuery(): string
    {
        return sprintf('SELECT * FROM %s EMIT CHANGES;', $this->ksqlTable);
    }

    public function getKsqlFillQuery(): PullQuery
    {
        return sprintf('SELECT * FROM %s;', $this->ksqlTable);
    }

    public function getKeyName()
    {
        return Str::snake(get_class($this));
    }

    public function getEventName()
    {
        return "ksql." . $this->getKeyName();
    }

    public function getCatchupQuery(): string
    {
        /** @var Model $stubModel */
        $stubModel = new $this->model;
        $updatedAtColumn = $stubModel->getUpdatedAtColumn();
        $latestModel = $this->model::orderBy($updatedAtColumn, 'desc')->limit(1)->get();

        return sprintf("SELECT * FROM %s WHERE %s >= '%s'", $this->ksqlTable, $this->ksqlUpdatedField, $latestModel->$updatedAtColumn);
    }
}
