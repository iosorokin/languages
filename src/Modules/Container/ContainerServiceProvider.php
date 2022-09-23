<?php

declare(strict_types=1);

namespace Modules\Container;

use Illuminate\Support\ServiceProvider;
use Modules\Container\Presenters\CreateContainer;
use Modules\Container\Presenters\CreateContainerPresenter;

final class ContainerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(CreateContainerPresenter::class, CreateContainer::class);
    }
}
