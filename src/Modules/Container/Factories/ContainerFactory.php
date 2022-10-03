<?php

namespace Modules\Container\Factories;

use Modules\Container\Contracts\Containerable;
use Modules\Container\Entites\Container;

interface ContainerFactory
{
    public function create(Containerable $containerable, array $attributes): Container;
}
