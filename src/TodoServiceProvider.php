<?php

namespace Alibahadori\Todo;

use Alibahadori\Todo\Providers\EventServiceProvider;
use Illuminate\Support\ServiceProvider;

class TodoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadViewsFrom(__DIR__ . '/views', 'todo');
        app('router')->aliasMiddleware('AuthorizeAccess', \Alibahadori\Todo\Http\Middleware\AuthorizeAccess::class);
    }

    public function register()
    {
        $this->app->register(EventServiceProvider::class);
    }
}
