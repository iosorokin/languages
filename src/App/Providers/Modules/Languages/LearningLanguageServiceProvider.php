<?php

namespace App\Providers\Modules\Languages;

use App\Contracts\Presenters\Languages\Learning\LearnRealLanguagePresenter;
use Illuminate\Support\ServiceProvider;
use Modules\Languages\Learning\Presenters\CreateRealLanguageLearning;
use Modules\Languages\Learning\Repositories\EloquentLearningLanguageRepository;
use Modules\Languages\Learning\Repositories\LearningLanguageRepository;

class LearningLanguageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(LearnRealLanguagePresenter::class, CreateRealLanguageLearning::class);

        $this->app->bind(LearningLanguageRepository::class, EloquentLearningLanguageRepository::class);
    }
}
