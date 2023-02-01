<?php
namespace ZiffMedia\LaravelKsql;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class KsqlStreamChanged
{
    use Dispatchable, SerializesModels;

    public string $queryName;
    public array $data;
}