<?php

namespace ZiffMedia\LaravelKsql;

use Illuminate\Support\ServiceProvider;

class KsqlServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                KsqlConsumerCommand::class
            ]);
        }
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/ksql.php' => config_path('ksql.php'),
        ], 'config');
    }
}