<?php

namespace Overburn\HttpRequest;

use Illuminate\Support\ServiceProvider;

class HttpRequestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['httpRequest'] = $this->app->share(function($app) {
            return new HttpRequest();
        });
    }
}

