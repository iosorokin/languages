<?php

namespace Core\Providers\Domain;

use Illuminate\Support\ServiceProvider;
use WIP\Personal\Account\Services\Auth\AuthService;
use WIP\Personal\Account\Services\Auth\Sanctum\SanctumAuth;

class PersonalServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(AuthService::class, SanctumAuth::class);
    }
}
