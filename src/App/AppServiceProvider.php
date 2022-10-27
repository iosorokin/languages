<?php

namespace App;

use Illuminate\Support\ServiceProvider;
use Modules\Personal\Domain\UserRepository;
use Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserRepository;

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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
    }
}
