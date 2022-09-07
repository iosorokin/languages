<?php

namespace App\Providers;

use App\Contracts\Structures\Languages\RealLanguageStructure;
use App\Contracts\Structures\Personal\BaseAuthStructure;
use App\Contracts\Structures\Personal\LearnerStructure;
use App\Contracts\Structures\Personal\UserStructure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Modules\Languages\Real\Repositories\EloquentRealLanguageRepository;
use Modules\Languages\Real\Repositories\RealLanguageRepository;
use Modules\Languages\Real\Structures\RealLanguageModel;
use Modules\Personal\Auth\Repositories\BaseAuthRepository;
use Modules\Personal\Auth\Repositories\EloquentBaseAuthRepository;
use Modules\Personal\Auth\Services\AuthService;
use Modules\Personal\Auth\Services\Sanctum\SanctumAuth;
use Modules\Personal\Auth\Structures\BaseAuthModel;
use Modules\Personal\Learner\Repositories\EloquentLernerRepository;
use Modules\Personal\Learner\Repositories\LearnerRepository;
use Modules\Personal\Learner\Structures\LearnerModel;
use Modules\Personal\User\Repositories\EloquentUserRepository;
use Modules\Personal\User\Repositories\UserRepository;
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
        Model::preventLazyLoading();
    }
}
