<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Factories;

use Illuminate\Support\Arr;
use Modules\Internal\Container\Contracts\Containerable;
use Modules\Internal\Container\Model\Container;
use Modules\Internal\Container\Enums\ContainerType;

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
