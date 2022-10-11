<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis;

use Illuminate\Support\ServiceProvider;
use Modules\Domain\Analysis\Factories\AnalysisFactory;
use Modules\Domain\Analysis\Factories\ModelAnalysisFactory;
use Modules\Domain\Analysis\Policies\AnalysisPolicy;
use Modules\Domain\Analysis\Policies\LaravelAnalysisPolicy;
use Modules\Domain\Analysis\Presenters\User\UserCreateAnalysis;
use Modules\Domain\Analysis\Presenters\User\UserCreateAnalysisPresenter;
use Modules\Domain\Analysis\Repositories\AnalysisRepository;
use Modules\Domain\Analysis\Repositories\EloquentAnalysisRepository;

final class AnalysisServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(UserCreateAnalysisPresenter::class, UserCreateAnalysis::class);
        $this->app->bind(AnalysisPolicy::class, LaravelAnalysisPolicy::class);
        $this->app->bind(AnalysisFactory::class, ModelAnalysisFactory::class);
        $this->app->bind(AnalysisRepository::class, EloquentAnalysisRepository::class);
    }
}
