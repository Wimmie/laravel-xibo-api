<?php

namespace Wimmie\XiboApi;

use Illuminate\Support\ServiceProvider;

class XiboApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laravel-xibo-api.php' => config_path('laravel-xibo-api.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/xibo-api.php', 'xibo-api');
    }
}
