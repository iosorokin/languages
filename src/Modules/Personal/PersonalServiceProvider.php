<?php

namespace Modules\Personal;

use Illuminate\Support\ServiceProvider;
use Modules\Personal\App\Services\AuthService;
use Modules\Personal\App\Services\Sanctum\SanctumAuth;

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
