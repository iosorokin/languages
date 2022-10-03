<?php

declare(strict_types=1);

namespace Modules\Container\Factories;

use Illuminate\Support\Arr;
use Modules\Container\Contracts\Containerable;
use Modules\Container\Enums\ContainerType;
use Modules\Container\Entites\ContainerModel;
use Modules\Container\Entites\Container;

final class ModelContainerFactory implements ContainerFactory
{
    public function create(Containerable $containerable, array $attributes): Container
    {
        $container = new ContainerModel();
        $container->setContainerable($containerable);
        $container->setTitle(Arr::get($attributes, 'title'));
        $container->setDescription(Arr::get($attributes, 'description'));
        $container->setType(ContainerType::tryFrom(Arr::get($attributes, 'type')));

        return $container;
    }
}
