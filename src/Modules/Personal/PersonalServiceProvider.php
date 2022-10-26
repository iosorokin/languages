<?php

namespace Modules\Personal;

use Illuminate\Support\ServiceProvider;
use Modules\Personal\Contexts\BaseAuth\Services\AuthService;
use Modules\Personal\Contexts\BaseAuth\Services\Sanctum\SanctumAuth;

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
