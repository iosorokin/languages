<?php

declare(strict_types=1);

namespace WIP\Internal\Container\Factories;

use WIP\Internal\Container\Contracts\Containerable;
use WIP\Internal\Container\Enums\ContainerType;
use WIP\Internal\Container\Model\Container;

final class ContainerFactory
{
    public function create(Containerable $containerable, array $attributes): Container
    {
        if ($attributes['type'] === ContainerType::Wrapper->value) {
            $attributes['title'] = null;
            $attributes['description'] = null;
        }

        $container = new Container();
        $container->containerable()->associate($containerable);
        $container->title = $attributes['title'];
        $container->description = $attributes['description'];
        $container->type = $attributes['type'];

        return $container;
    }
}
