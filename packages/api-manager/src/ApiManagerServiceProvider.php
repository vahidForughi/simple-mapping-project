<?php

namespace ApiManager;

use Illuminate\Support\ServiceProvider;

class ApiManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/config/mappers/sample.yml' => config_path('sample.yml'),
            ], 'mappers-config');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->mergeConfigFrom(__DIR__.'/config/mappers', 'mappers');
    }
}
