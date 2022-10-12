<?php

namespace Modules\Internal\Container\Factories;

use Modules\Internal\Container\Contracts\Containerable;
use Modules\Internal\Container\Structures\Container;

interface ContainerFactory
{
    public function create(Containerable $containerable, array $attributes): Container;
}
