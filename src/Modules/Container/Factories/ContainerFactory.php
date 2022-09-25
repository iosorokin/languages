<?php

declare(strict_types=1);

namespace Modules\Container\Factories;

use Illuminate\Support\Arr;
use Modules\Container\Contracts\Containerable;
use Modules\Container\Enums\ContainerType;
use Modules\Container\Structures\ContainerModel;
use Modules\Container\Structures\ContainerStructure;

final class ContainerFactory
{
    public function new(Containerable $containerable, array $attributes): ContainerStructure
    {
        $type = Arr::get($attributes, 'type');

        $structure = new ContainerModel();
        $structure->setContainerable($containerable);
        $structure->title = Arr::get($attributes, 'title');
        $structure->description = Arr::get($attributes, 'description');
        $structure->container_type = $type instanceof ContainerType ? $type : ContainerType::tryFrom($type);

        return $structure;
    }
}
