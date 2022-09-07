<?php

namespace App;

use App\Repositories\Lanugages\EloquentRealLanguageRepository;
use App\Repositories\Lanugages\RealLanguageRepository;
use App\Repositories\Personal\Auth\BaseAuthRepository;
use App\Repositories\Personal\Auth\EloquentBaseAuthRepository;
use App\Repositories\Personal\Learner\EloquentLernerRepository;
use App\Repositories\Personal\Learner\LearnerRepository;
use App\Repositories\Personal\User\EloquentUserRepository;
use App\Repositories\Personal\User\UserRepository;
use App\Structures\Languages\RealLanguageStructure;
use App\Structures\Personal\BaseAuthStructure;
use App\Structures\Personal\LearnerStructure;
use App\Structures\Personal\UserStructure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Modules\Languages\Real\Structures\RealLanguageModel;
use Modules\Personal\Auth\Services\AuthService;
use Modules\Personal\Auth\Services\Sanctum\SanctumAuth;
use Modules\Personal\Auth\Structures\BaseAuthModel;
use Modules\Personal\Learner\Structures\LearnerModel;
use Modules\Personal\User\Structures\UserModel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(LearnerRepository::class, EloquentLernerRepository::class);
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(BaseAuthRepository::class, EloquentBaseAuthRepository::class);
        $this->app->bind(RealLanguageRepository::class, EloquentRealLanguageRepository::class);

        $this->app->bind(UserStructure::class, UserModel::class);
        $this->app->bind(LearnerStructure::class, LearnerModel::class);
        $this->app->bind(BaseAuthStructure::class, BaseAuthModel::class);
        $this->app->bind(RealLanguageStructure::class, RealLanguageModel::class);

        $this->app->bind(AuthService::class, SanctumAuth::class);

        Model::preventLazyLoading();
    }
}
