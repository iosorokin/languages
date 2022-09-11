<?php

namespace App\Providers\Modules\Personal;

use App\Contracts\Presenters\Personal\Auth\CreateBaseAuthPresenter;
use App\Contracts\Presenters\Personal\Auth\GetClientPresenter;
use App\Contracts\Presenters\Personal\Auth\LearnerBaseLoginPresenter;
use App\Contracts\Presenters\Personal\Auth\SaveBaseAuthPresenter;
use App\Contracts\Structures\Personal\BaseAuthStructure;
use Illuminate\Support\ServiceProvider;
use Modules\Personal\Auth\Presenters\Base\CreateBaseAuth;
use Modules\Personal\Auth\Presenters\Base\SaveBaseAuth;
use Modules\Personal\Auth\Presenters\GetClient;
use Modules\Personal\Auth\Presenters\Login\LearnerBaseLogin;
use Modules\Personal\Auth\Repositories\BaseAuthRepository;
use Modules\Personal\Auth\Repositories\EloquentBaseAuthRepository;
use Modules\Personal\Auth\Services\AuthService;
use Modules\Personal\Auth\Services\Sanctum\SanctumAuth;
use Modules\Personal\Auth\Structures\BaseAuthModel;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(BaseAuthRepository::class, EloquentBaseAuthRepository::class);

        $this->app->bind(BaseAuthStructure::class, BaseAuthModel::class);

        $this->app->bind(AuthService::class, SanctumAuth::class);

        $this->app->bind(CreateBaseAuthPresenter::class, CreateBaseAuth::class);
        $this->app->bind(LearnerBaseLoginPresenter::class, LearnerBaseLogin::class);
        $this->app->bind(GetClientPresenter::class, GetClient::class);
        $this->app->bind(SaveBaseAuthPresenter::class, SaveBaseAuth::class);
    }
}
