<?php

namespace Modules\Internal\Container\Factories;

use Modules\Internal\Container\Contracts\ContainerableElement;
use Modules\Internal\Container\Structures\Container;
use Modules\Internal\Container\Structures\ContainerElement;

interface ContainerElementFactory
{
    public function create(Container $container, ContainerableElement $element): ContainerElement;
}
