<?php

namespace App\Providers;

use App\Services\ParseJsonFile;
use Illuminate\Support\ServiceProvider;

class ParseJsonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\ParseJsonFile', function () {
            return new ParseJsonFile(env('JSONURL'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
