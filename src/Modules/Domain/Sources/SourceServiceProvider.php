<?php

declare(strict_types=1);

namespace Modules\Domain\Sources;

use Illuminate\Support\ServiceProvider;
use Modules\Domain\Sources\Factories\ModelSourceFactory;
use Modules\Domain\Sources\Factories\SourceFactory;
use Modules\Domain\Sources\Policies\LaravelSourcePolicy;
use Modules\Domain\Sources\Policies\SourcePolicy;
use Modules\Domain\Sources\Presenters\Internal\GetSource;
use Modules\Domain\Sources\Presenters\Internal\GetSourcePresenter;
use Modules\Domain\Sources\Presenters\Guest\GuestShowSource;
use Modules\Domain\Sources\Presenters\Guest\GuestShowSourcePresenter;
use Modules\Domain\Sources\Presenters\User\UserCreateSource;
use Modules\Domain\Sources\Presenters\User\UserCreateSourcePresenter;
use Modules\Domain\Sources\Repositories\EloquentSourceRepository;
use Modules\Domain\Sources\Repositories\SourceRepository;

final class SourceServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(UserCreateSourcePresenter::class, UserCreateSource::class);
        $this->app->bind(GetSourcePresenter::class, GetSource::class);
        $this->app->bind(GuestShowSourcePresenter::class, GuestShowSource::class);

        $this->app->bind(SourceRepository::class, EloquentSourceRepository::class);

        $this->app->bind(SourceFactory::class, ModelSourceFactory::class);

        $this->app->bind(SourcePolicy::class, LaravelSourcePolicy::class);
    }
}
