<?php

namespace Modules\Container\Factories;

use Modules\Container\Contracts\ContainerableElement;
use Modules\Container\Entites\ContainerElementModel;
use Modules\Container\Entites\ContainerElement;
use Modules\Container\Entites\Container;

interface ContainerElementFactory
{
    public function create(Container $container, ContainerableElement $element): ContainerElement;
}
