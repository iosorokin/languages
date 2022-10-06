<?php

declare(strict_types=1);

namespace Modules\Core\Sources;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Sources\Factories\ModelSourceFactory;
use Modules\Core\Sources\Factories\SourceFactory;
use Modules\Core\Sources\Policies\LaravelSourcePolicy;
use Modules\Core\Sources\Policies\SourcePolicy;
use Modules\Core\Sources\Presenters\Internal\GetSource;
use Modules\Core\Sources\Presenters\Internal\GetSourcePresenter;
use Modules\Core\Sources\Presenters\Publics\PublicShowSource;
use Modules\Core\Sources\Presenters\Publics\PublicShowSourcePresenter;
use Modules\Core\Sources\Presenters\User\UserCreateSource;
use Modules\Core\Sources\Presenters\User\UserCreateSourcePresenter;
use Modules\Core\Sources\Repositories\EloquentSourceRepository;
use Modules\Core\Sources\Repositories\SourceRepository;

final class SourceServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(UserCreateSourcePresenter::class, UserCreateSource::class);
        $this->app->bind(GetSourcePresenter::class, GetSource::class);
        $this->app->bind(PublicShowSourcePresenter::class, PublicShowSource::class);

        $this->app->bind(SourceRepository::class, EloquentSourceRepository::class);

        $this->app->bind(SourceFactory::class, ModelSourceFactory::class);

        $this->app->bind(SourcePolicy::class, LaravelSourcePolicy::class);
    }
}
