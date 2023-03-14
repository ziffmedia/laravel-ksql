<?php

namespace ZiffMedia\LaravelKsql;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class KsqlChanged
{
    use Dispatchable, SerializesModels;

    public function __construct(public array $data)
    {
    }
}
