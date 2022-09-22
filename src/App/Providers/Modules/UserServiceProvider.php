<?php

namespace App\Providers\Modules;

use App\Contracts\Presenters\Personal\User\CreateUserPresenter;
use App\Contracts\Presenters\Personal\User\SaveUserPresenter;
use App\Contracts\Structures\UserStructure;
use Illuminate\Support\ServiceProvider;
use Modules\Personal\User\Presenters\CreateUser;
use Modules\Personal\User\Presenters\SaveUser;
use Modules\Personal\User\Repositories\EloquentUserRepository;
use Modules\Personal\User\Repositories\UserRepository;
use Modules\Personal\User\Structures\UserModel;

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
