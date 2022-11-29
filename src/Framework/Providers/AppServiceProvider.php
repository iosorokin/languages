<?php

namespace Framework\Providers;

use Core\Base\Collections\CollectionDriver;
use Core\Base\Collections\Laravel\LaravelCollectionDriver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    public function boot()
    {
        $this->app->useAppPath('src/Domain');

        $this->app->bind(CollectionDriver::class, LaravelCollectionDriver::class);
    }
}
