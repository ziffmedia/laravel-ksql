<?php

namespace ZiffMedia\LaravelKsql;

use Illuminate\Database\Eloquent\Model;
use ZiffMedia\Ksql\Offset;

class KsqlResource
{
    public string $ksqlTable;

    public ?string $ksqlUpdatedField;

    public bool $catchUpBeforeConsume = false;

    public ?string $model;

    public Offset $offset = Offset::LATEST;

    public function handle(KsqlChanged $data)
    {
    }

    public function getKsqlStreamQuery(): string
    {
        return sprintf('SELECT * FROM %s EMIT CHANGES;', $this->ksqlTable);
    }

    public function getKsqlFillQuery(): string
    {
        return sprintf('SELECT * FROM %s;', $this->ksqlTable);
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
