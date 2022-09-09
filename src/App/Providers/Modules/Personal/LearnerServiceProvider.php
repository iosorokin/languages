<?php

namespace App\Providers\Modules\Personal;

use App\Contracts\Presenters\Personal\Learner\CreateLearnerPresenter;
use App\Contracts\Presenters\Personal\Learner\RegisterLearnerPresenter;
use App\Contracts\Presenters\Personal\Learner\SaveLearnerPresenter;
use App\Contracts\Structures\Personal\LearnerStructure;
use Illuminate\Support\ServiceProvider;
use Modules\Personal\Learner\Presenters\CreateLearner;
use Modules\Personal\Learner\Presenters\RegisterLearner;
use Modules\Personal\Learner\Presenters\SaveLearner;
use Modules\Personal\Learner\Repositories\EloquentLernerRepository;
use Modules\Personal\Learner\Repositories\LearnerRepository;
use Modules\Personal\Learner\Structures\LearnerModel;

class LearnerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(LearnerRepository::class, EloquentLernerRepository::class);

        $this->app->bind(LearnerStructure::class, LearnerModel::class);

        $this->app->bind(RegisterLearnerPresenter::class, RegisterLearner::class);
        $this->app->bind(SaveLearnerPresenter::class, SaveLearner::class);
        $this->app->bind(CreateLearnerPresenter::class, CreateLearner::class);
    }
}
