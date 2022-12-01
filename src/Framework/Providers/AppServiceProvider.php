<?php

namespace Framework\Providers;

use Core\Base\Collections\CollectionDriver;
use Core\Base\Collections\Laravel\LaravelCollectionDriver;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

/**
 * @property Application $app
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->useAppPath('src/Framework');
    }

    public function boot()
    {
        $this->app->bind(CollectionDriver::class, LaravelCollectionDriver::class);
    }
}
