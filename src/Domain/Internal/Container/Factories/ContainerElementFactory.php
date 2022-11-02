<?php

declare(strict_types=1);

namespace Domain\Internal\Container\Factories;

use Domain\Internal\Container\Contracts\ContainerableElement;
use Domain\Internal\Container\Model\Container;
use Domain\Internal\Container\Model\ContainerElement;

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
