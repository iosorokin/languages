<?php

namespace Modules\Personal\User;

use Illuminate\Support\ServiceProvider;
use Modules\Personal\User\Factories\LaravelUserFactory;
use Modules\Personal\User\Factories\UserFactory;
use Modules\Personal\User\Policy\UserPolicy;
use Modules\Personal\User\Policy\LaravelUserPolicy;
use Modules\Personal\User\Presenters\Admin\AdminCreateUser;
use Modules\Personal\User\Presenters\Admin\AdminCreateUserPresenter;
use Modules\Personal\User\Presenters\Publics\Register;
use Modules\Personal\User\Presenters\Publics\RegisterPresenter;
use Modules\Personal\User\Presenters\Internal\GetUser;
use Modules\Personal\User\Presenters\Internal\GetUserPresenter;
use Modules\Personal\User\Presenters\Special\InitRootUser;
use Modules\Personal\User\Presenters\Special\InitRootUserPresenter;
use Modules\Personal\User\Repositories\EloquentUserRepository;
use Modules\Personal\User\Repositories\UserRepository;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(AdminCreateUserPresenter::class, AdminCreateUser::class);
        $this->app->bind(RegisterPresenter::class, Register::class);
        $this->app->bind(GetUserPresenter::class, GetUser::class);
        $this->app->bind(InitRootUserPresenter::class, InitRootUser::class);

        $this->app->bind(UserRepository::class, EloquentUserRepository::class);

        $this->app->bind(UserPolicy::class, LaravelUserPolicy::class);

        $this->app->bind(UserFactory::class, LaravelUserFactory::class);
    }
}
