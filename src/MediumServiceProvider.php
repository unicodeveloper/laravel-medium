<?php

namespace Unicodeveloper\Medium;

use Illuminate\Support\ServiceProvider;

class MediumServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Publishes all the config file this package needs to function
     * @return void
     */
    public function boot()
    {
        $config = realpath(__DIR__.'/../resources/config/medium.php');

        $this->publishes([
            $config => config_path('medium.php')
        ]);
    }

    /**
     * Register the application services
     * @return void
     */
    public function register()
    {
        $this->app->bind('laravel-medium', function(){

            return new MediumManager;

        });
    }

    /**
     * Get the services provided by the provider
     * @return array
     */
    public function provides()
    {
        return ['laravel-medium'];
    }
}