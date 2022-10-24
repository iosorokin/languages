<?php

namespace Modules\Personal\Auth;

use Illuminate\Support\ServiceProvider;
use Modules\Personal\Auth\Services\AuthService;
use Modules\Personal\Auth\Services\Sanctum\SanctumAuth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(AuthService::class, SanctumAuth::class);
    }
}
