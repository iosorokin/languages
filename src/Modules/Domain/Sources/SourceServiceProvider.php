<?php

declare(strict_types=1);

namespace Modules\Domain\Sources;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Modules\Domain\Languages\Presenters\User\UserIndexLanguages;
use Modules\Domain\Languages\Presenters\User\UserIndexLanguagesPresenter;
use Modules\Domain\Sources\Authorization\SourceAuthorizeUser;
use Modules\Domain\Sources\Authorization\SourceAuthorizeUserImpl;
use Modules\Domain\Sources\Events\SourceCreated;
use Modules\Domain\Sources\Factories\EloquentSourceFactory;
use Modules\Domain\Sources\Factories\SourceFactory;
use Modules\Domain\Sources\Presenters\Guest\GuestIndexSources;
use Modules\Domain\Sources\Presenters\Guest\GuestIndexSourcesPresenter;
use Modules\Domain\Sources\Presenters\Guest\GuestShowSource;
use Modules\Domain\Sources\Presenters\Guest\GuestShowSourcePresenter;
use Modules\Domain\Sources\Presenters\Guest\Items\GuestIndexSourceItems;
use Modules\Domain\Sources\Presenters\Guest\Items\GuestIndexSourceItemsPresenter;
use Modules\Domain\Sources\Presenters\Internal\GetSource;
use Modules\Domain\Sources\Presenters\Internal\GetSourcePresenter;
use Modules\Domain\Sources\Presenters\Mixins\CreateSource;
use Modules\Domain\Sources\Presenters\Mixins\IndexSource;
use Modules\Domain\Sources\Presenters\Mixins\ShowSource;
use Modules\Domain\Sources\Presenters\Requests\IsFirstUserSourceForLanguage;
use Modules\Domain\Sources\Presenters\Requests\IsFirstUserSourceForLanguagePresenter;
use Modules\Domain\Sources\Presenters\SeedSource;
use Modules\Domain\Sources\Presenters\User\Items\UserIndexSourceItems;
use Modules\Domain\Sources\Presenters\User\Items\UserIndexSourceItemsPresenter;
use Modules\Domain\Sources\Presenters\User\UserCreateSource;
use Modules\Domain\Sources\Presenters\User\UserCreateSourcePresenter;
use Modules\Domain\Sources\Presenters\User\UserDeleteSource;
use Modules\Domain\Sources\Presenters\User\UserDeleteSourcePresenter;
use Modules\Domain\Sources\Presenters\User\UserShowSource;
use Modules\Domain\Sources\Presenters\User\UserShowSourcePresenter;
use Modules\Domain\Sources\Presenters\User\UserUpdateSource;
use Modules\Domain\Sources\Presenters\User\UserUpdateSourcePresenter;

final class SourceServiceProvider extends ServiceProvider
{
    private array $write = [
        CreateSource::class,

        SeedSource::class,
    ];

    private array $read = [
        ShowSource::class,
        IndexSource::class,
    ];

    public function boot(): void
    {
        $this->bindPresenters();
        $this->registerEvents();
        $this->bindFactory();
        $this->bindAuthorizations();
    }

    private function bindAuthorizations()
    {
        $this->app->bind(SourceAuthorizeUser::class, SourceAuthorizeUserImpl::class);
    }

    private function bindPresenters()
    {
        $this->app->bind(GuestShowSourcePresenter::class, GuestShowSource::class);
        $this->app->bind(GuestIndexSourcesPresenter::class, GuestIndexSources::class);
        $this->app->bind(GuestIndexSourceItemsPresenter::class, GuestIndexSourceItems::class);

        $this->app->bind(UserCreateSourcePresenter::class, UserCreateSource::class);
        $this->app->bind(UserShowSourcePresenter::class, UserShowSource::class);
        $this->app->bind(UserIndexLanguagesPresenter::class, UserIndexLanguages::class);
        $this->app->bind(UserUpdateSourcePresenter::class, UserUpdateSource::class);
        $this->app->bind(UserDeleteSourcePresenter::class, UserDeleteSource::class);
        $this->app->bind(UserIndexSourceItemsPresenter::class, UserIndexSourceItems::class);

        $this->app->bind(GetSourcePresenter::class, GetSource::class);

        $this->app->bind(IsFirstUserSourceForLanguagePresenter::class, IsFirstUserSourceForLanguage::class);
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
