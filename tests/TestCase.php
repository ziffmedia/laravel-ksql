<?php

use Orchestra\Testbench\TestCase as Orchestra;
use ZiffMedia\LaravelKsql\KsqlServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            KsqlServiceProvider::class,
        ];
    }
}
