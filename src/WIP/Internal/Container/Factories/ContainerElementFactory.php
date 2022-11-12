<?php

declare(strict_types=1);

namespace WIP\Internal\Container\Factories;

use WIP\Internal\Container\Contracts\ContainerableElement;
use WIP\Internal\Container\Model\Container;
use WIP\Internal\Container\Model\ContainerElement;

final class ContainerElementFactory
{
    public function create(Container $container, ContainerableElement $element): ContainerElement
    {
        $model = new ContainerElement();
        $model->container()->associate($container);
        $model->element()->associate($element);

        return $model;
    }
}
