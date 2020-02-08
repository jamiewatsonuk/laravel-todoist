<?php

namespace Watson\Todoist;

use Illuminate\Support\ServiceProvider;

class TodoistServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laravel-todoist.php' => config_path('laravel-todoist.php'),
        ], 'config');
    }

    public function register() : void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-todoist.php', 'laravel-todoist');

        $this->app->bind(Todoist::class, function () {
            return TodoistFactory::make();
        });

        $this->app->alias(Todoist::class, 'laravel-todoist');
    }
}
