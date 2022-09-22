<?php

namespace App\Providers\Modules;

use App\Contracts\Presenters\Languages\Learning\GetLearningLanguagePresenter;
use App\Contracts\Presenters\Languages\Learning\LearnRealLanguagePresenter;
use Illuminate\Support\ServiceProvider;
use Modules\Languages\Learning\Presenters\GetLearningLanguage;
use Modules\Languages\Learning\Presenters\LearnRealLanguage;
use Modules\Languages\Learning\Repositories\EloquentLearningLanguageRepository;
use Modules\Languages\Learning\Repositories\LearningLanguageRepository;

class LearningLanguageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(LearnRealLanguagePresenter::class, LearnRealLanguage::class);
        $this->app->bind(GetLearningLanguagePresenter::class, GetLearningLanguage::class);

        $this->app->bind(LearningLanguageRepository::class, EloquentLearningLanguageRepository::class);
    }
}
