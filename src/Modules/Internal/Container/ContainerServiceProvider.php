<?php

declare(strict_types=1);

namespace Modules\Internal\Container;

use Illuminate\Support\ServiceProvider;
use Modules\Internal\Container\Factories\ContainerElementFactory;
use Modules\Internal\Container\Factories\ContainerFactory;
use Modules\Internal\Container\Factories\ModelContainerElementFactory;
use Modules\Internal\Container\Factories\ModelContainerFactory;
use Modules\Internal\Container\Policies\ContainerPolicy;
use Modules\Internal\Container\Policies\LaravelContainerPolicy;
use Modules\Internal\Container\Presenters\GetContainer;
use Modules\Internal\Container\Presenters\GetContainerPresenter;
use Modules\Internal\Container\Presenters\Internal\CreateContainer;
use Modules\Internal\Container\Presenters\Internal\CreateContainerPresenter;
use Modules\Internal\Container\Presenters\Internal\InitWrapperContainer;
use Modules\Internal\Container\Presenters\Internal\InitWrapperContainerPresenter;
use Modules\Internal\Container\Presenters\Internal\PushElement;
use Modules\Internal\Container\Presenters\Internal\PushElementPresenter;
use Modules\Internal\Container\Presenters\User\UserPushElement;
use Modules\Internal\Container\Presenters\User\UserPushElementPresenter;
use Modules\Internal\Container\Repositories\ContainerRepository;
use Modules\Internal\Container\Repositories\EloquentContainerRepository;

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
        $this->app->bind(CreateContainerPresenter::class, CreateContainer::class);
    }
}
