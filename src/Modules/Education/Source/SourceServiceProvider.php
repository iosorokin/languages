<?php

declare(strict_types=1);

namespace Modules\Education\Source;

use Illuminate\Support\ServiceProvider;
use Modules\Education\Source\Factories\ModelSourceFactory;
use Modules\Education\Source\Factories\SourceFactory;
use Modules\Education\Source\Policies\LaravelSourcePolicy;
use Modules\Education\Source\Policies\SourcePolicy;
use Modules\Education\Source\Presenters\Internal\GetSource;
use Modules\Education\Source\Presenters\Internal\GetSourcePresenter;
use Modules\Education\Source\Presenters\Publics\PublicShowSource;
use Modules\Education\Source\Presenters\Publics\PublicShowSourcePresenter;
use Modules\Education\Source\Presenters\User\UserCreateSource;
use Modules\Education\Source\Presenters\User\UserCreateSourcePresenter;
use Modules\Education\Source\Repositories\EloquentSourceRepository;
use Modules\Education\Source\Repositories\SourceRepository;

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
