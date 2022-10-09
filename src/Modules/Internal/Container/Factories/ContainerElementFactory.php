<?php

namespace Modules\Internal\Container\Factories;

use Modules\Internal\Container\Contracts\ContainerableElement;
use Modules\Internal\Container\Entites\Container;
use Modules\Internal\Container\Entites\ContainerElement;

interface ContainerElementFactory
{
    public function create(Container $container, ContainerableElement $element): ContainerElement;
}
