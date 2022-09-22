<?php

declare(strict_types=1);

namespace App\Providers\Modules;

use App\Contracts\Presenters\Education\Source\CreateLearningLanguageSourcePresenter;
use App\Contracts\Presenters\Education\Source\CreateRealLanguageSourcePresenter;
use Illuminate\Support\ServiceProvider;
use Modules\Education\Source\Presenters\CreateLearningLanguageSource;
use Modules\Education\Source\Presenters\CreateRealLanguageSource;
use Modules\Education\Source\Repositories\EloquentSourceRepository;
use Modules\Education\Source\Repositories\SourceRepository;

class SourceServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(CreateRealLanguageSourcePresenter::class, CreateRealLanguageSource::class);
        $this->app->bind(CreateLearningLanguageSourcePresenter::class, CreateLearningLanguageSource::class);
        $this->app->bind(SourceRepository::class, EloquentSourceRepository::class);
    }
}
