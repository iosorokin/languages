<?php

declare(strict_types=1);

namespace Modules\Container;

use Illuminate\Support\ServiceProvider;
use Modules\Container\Factories\ContainerElementFactory;
use Modules\Container\Factories\ContainerFactory;
use Modules\Container\Factories\ModelContainerElementFactory;
use Modules\Container\Factories\ModelContainerFactory;
use Modules\Container\Policies\ContainerPolicy;
use Modules\Container\Policies\LaravelContainerPolicy;
use Modules\Container\Presenters\GetContainer;
use Modules\Container\Presenters\GetContainerPresenter;
use Modules\Container\Presenters\Internal\InitWrapperContainer;
use Modules\Container\Presenters\Internal\InitWrapperContainerPresenter;
use Modules\Container\Presenters\Internal\PushElement;
use Modules\Container\Presenters\Internal\PushElementPresenter;
use Modules\Container\Presenters\User\UserPushElement;
use Modules\Container\Presenters\User\UserPushElementPresenter;
use Modules\Container\Repositories\ContainerRepository;
use Modules\Container\Repositories\EloquentContainerRepository;

final class ContainerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(InitWrapperContainerPresenter::class, InitWrapperContainer::class);
        $this->app->bind(UserPushElementPresenter::class, UserPushElement::class);
        $this->app->bind(ContainerPolicy::class, LaravelContainerPolicy::class);
        $this->app->bind(ContainerRepository::class, EloquentContainerRepository::class);
        $this->app->bind(ContainerFactory::class, ModelContainerFactory::class);
        $this->app->bind(ContainerElementFactory::class, ModelContainerElementFactory::class);
        $this->app->bind(PushElementPresenter::class, PushElement::class);
        $this->app->bind(GetContainerPresenter::class, GetContainer::class);
    }
}
