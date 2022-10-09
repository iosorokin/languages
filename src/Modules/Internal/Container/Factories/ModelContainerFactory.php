<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Factories;

use Illuminate\Support\Arr;
use Modules\Internal\Container\Contracts\Containerable;
use Modules\Internal\Container\Entites\Container;
use Modules\Internal\Container\Entites\ContainerModel;
use Modules\Internal\Container\Enums\ContainerType;

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
