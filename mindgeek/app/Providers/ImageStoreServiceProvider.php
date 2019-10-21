<?php

namespace App\Providers;

use App\Libraries\ImageStore;
use Illuminate\Support\ServiceProvider;

class ImageStoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Libraries\ImageStore', function () {
            return new ImageStore();
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
