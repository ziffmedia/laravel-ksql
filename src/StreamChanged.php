<?php

namespace ZiffMedia\LaravelKsql;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use ZiffMedia\Ksql\PushQueryRow;

class StreamChanged
{
    use Dispatchable, SerializesModels;

    public function __construct(public PushQueryRow $data)
    {
    }
}
