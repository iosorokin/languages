<?php

declare(strict_types=1);

namespace Modules\Container;

use Illuminate\Support\ServiceProvider;
use Modules\Container\Presenters\CreateContainer;
use Modules\Container\Presenters\CreateContainerPresenter;
use Modules\Container\Presenters\Policies\CanEditContainer;
use Modules\Container\Presenters\Policies\CanEditContainerPresenter;

final class ContainerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(CreateContainerPresenter::class, CreateContainer::class);
        $this->app->bind(CanEditContainerPresenter::class, CanEditContainer::class);
    }
}
