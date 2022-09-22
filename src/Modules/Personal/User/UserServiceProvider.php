<?php

namespace Modules\Personal\User;

use Illuminate\Support\ServiceProvider;
use Modules\Personal\User\Presenters\CreateUser;
use Modules\Personal\User\Presenters\CreateUserPresenter;
use Modules\Personal\User\Presenters\SaveUser;
use Modules\Personal\User\Presenters\SaveUserPresenter;
use Modules\Personal\User\Repositories\EloquentUserRepository;
use Modules\Personal\User\Repositories\UserRepository;
use Modules\Personal\User\Structures\UserModel;
use Modules\Personal\User\Structures\UserStructure;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);

        $this->app->bind(UserStructure::class, UserModel::class);

        $this->app->bind(CreateUserPresenter::class, CreateUser::class);
        $this->app->bind(SaveUserPresenter::class, SaveUser::class);
    }
}
