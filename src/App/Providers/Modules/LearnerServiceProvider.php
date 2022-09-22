<?php

namespace App\Providers\Modules;

use App\Contracts\Presenters\Personal\Learner\GetLearnerPresenter;
use App\Contracts\Presenters\Personal\Learner\RegisterLearnerPresenter;
use Illuminate\Support\ServiceProvider;
use Modules\Personal\Learner\Presenters\GetLearner;
use Modules\Personal\Learner\Presenters\RegisterLearner;
use Modules\Personal\Learner\Repositories\EloquentLernerRepository;
use Modules\Personal\Learner\Repositories\LearnerRepository;

class LearnerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(LearnerRepository::class, EloquentLernerRepository::class);

        $this->app->bind(RegisterLearnerPresenter::class, RegisterLearner::class);
        $this->app->bind(GetLearnerPresenter::class, GetLearner::class);
    }
}
