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
        $this->app->singleton(HttpRequest::class, function () {
            return new HttpRequest;
        });

        $this->app->alias(HttpRequest::class, 'httpRequest');
    }
}

