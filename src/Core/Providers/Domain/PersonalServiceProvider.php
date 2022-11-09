<?php

namespace Core\Providers\Domain;

use Domain\Personal\Account\Services\Auth\AuthService;
use Domain\Personal\Account\Services\Auth\Sanctum\SanctumAuth;
use Illuminate\Support\ServiceProvider;

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
