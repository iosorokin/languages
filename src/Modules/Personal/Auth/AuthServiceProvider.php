<?php

namespace Modules\Personal\Auth;

use Illuminate\Support\ServiceProvider;
use Modules\Personal\Auth\Contexts\Client;
use Modules\Personal\Auth\Contexts\ClientContext;
use Modules\Personal\Auth\Factories\BaseAuthFactory;
use Modules\Personal\Auth\Factories\ModelBaseAuthFactory;
use Modules\Personal\Auth\Presenters\Base\BaseLogin;
use Modules\Personal\Auth\Presenters\Base\BaseLoginPresenter;
use Modules\Personal\Auth\Presenters\GetClient;
use Modules\Personal\Auth\Presenters\GetClientPresenter;
use Modules\Personal\Auth\Presenters\Logout;
use Modules\Personal\Auth\Presenters\LogoutPresenter;
use Modules\Personal\Auth\Repositories\BaseAuthRepository;
use Modules\Personal\Auth\Repositories\EloquentBaseAuthRepository;
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
        $this->app->bind(Client::class, ClientContext::class);

        $this->app->bind(BaseAuthRepository::class, EloquentBaseAuthRepository::class);
        $this->app->bind(BaseAuthFactory::class, ModelBaseAuthFactory::class);

        $this->app->bind(AuthService::class, SanctumAuth::class);

        $this->app->bind(BaseLoginPresenter::class, BaseLogin::class);
        $this->app->bind(GetClientPresenter::class, GetClient::class);
        $this->app->bind(LogoutPresenter::class, Logout::class);
    }
}
