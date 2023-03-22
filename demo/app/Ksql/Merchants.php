<?php

namespace App\Ksql;

use ZiffMedia\LaravelKsql\KsqlChanged;
use ZiffMedia\LaravelKsql\KsqlResource;

class Merchants extends KsqlResource
{
    public string $ksqlTable = 'merchants';

    public ?string $ksqlUpdatedField = 'updated_at';

    public function handle(KsqlChanged $data)
    {
    }
}
