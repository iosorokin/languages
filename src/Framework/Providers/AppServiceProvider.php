<?php

namespace Framework\Providers;

use App\Base\Collections\CollectionDriver;
use App\Base\Collections\Laravel\LaravelCollectionDriver;
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
