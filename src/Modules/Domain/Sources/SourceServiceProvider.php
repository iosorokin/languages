<?php

declare(strict_types=1);

namespace Modules\Domain\Sources;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Modules\Domain\Sources\Actions\CreateSource;
use Modules\Domain\Sources\Actions\IndexSource;
use Modules\Domain\Sources\Actions\ShowSource;
use Modules\Domain\Sources\Events\SourceCreated;
use Modules\Domain\Sources\Factories\EloquentSourceFactory;
use Modules\Domain\Sources\Factories\SourceFactory;
use Modules\Domain\Sources\Factories\Structure\ModelSourceFactory;
use Modules\Domain\Sources\Factories\Structure\SourceStructureFactory;
use Modules\Domain\Sources\Authorization\AuthorizeSourceImpl;
use Modules\Domain\Sources\Authorization\AuthorizeSource;
use Modules\Domain\Sources\Presenters\Guest\GuestShowSource;
use Modules\Domain\Sources\Presenters\Guest\GuestShowSourcePresenter;
use Modules\Domain\Sources\Presenters\Internal\GetSource;
use Modules\Domain\Sources\Presenters\Internal\GetSourcePresenter;
use Modules\Domain\Sources\Presenters\User\UserCreateSource;
use Modules\Domain\Sources\Presenters\User\UserCreateSourcePresenter;
use Modules\Domain\Sources\Presenters\User\UserShowSource;
use Modules\Domain\Sources\Presenters\User\UserShowSourcePresenter;
use Modules\Domain\Sources\Repositories\EloquentSourceRepository;
use Modules\Domain\Sources\Repositories\SourceRepository;

final class SourceServiceProvider extends ServiceProvider
{
    private array $write = [
        CreateSource::class,
    ];

    private array $read = [
        ShowSource::class,
        IndexSource::class,
    ];

    public function boot(): void
    {
        $this->bindImplementations();
        $this->registerEvents();
        $this->bindFactory();
    }

    private function bindImplementations()
    {
        $this->app->bind(UserCreateSourcePresenter::class, UserCreateSource::class);
        $this->app->bind(GetSourcePresenter::class, GetSource::class);
        $this->app->bind(GuestShowSourcePresenter::class, GuestShowSource::class);
        $this->app->bind(AuthorizeSource::class, AuthorizeSourceImpl::class);
        $this->app->bind(UserShowSourcePresenter::class, UserShowSource::class);
    }

    private function registerEvents()
    {
        foreach (SourceCreated::listeners () as $listener) {
            Event::listen(SourceCreated::class, $listener);
        }
    }

    private function bindFactory()
    {
        foreach ($this->write as $class) {
            $this->app->beforeResolving($class, function () {
                $this->app->bind(SourceFactory::class, EloquentSourceFactory::class);
            });
        }

        foreach ($this->read as $class) {
            $this->app->beforeResolving($class, function () {
                $this->app->bind(SourceFactory::class, EloquentSourceFactory::class);
            });
        }
    }
}
