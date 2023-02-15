<?php

namespace ZiffMedia\LaravelKsql;

use Illuminate\Support\ServiceProvider;
use ZiffMedia\Ksql\Client;

class KsqlServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ConsumerCommand::class,
            ]);
        }

        $this->app->bind(Client::class, function () {
            return new Client(
                config('ksql.endpoint'),
                config('ksql.auth.username'),
                config('ksql.auth.password')
            );
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/ksql.php' => config_path('ksql.php'),
        ], 'config');
    }
}
