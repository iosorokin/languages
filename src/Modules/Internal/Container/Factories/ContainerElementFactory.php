<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Factories;

use Modules\Internal\Container\Contracts\ContainerableElement;
use Modules\Internal\Container\Model\Container;
use Modules\Internal\Container\Model\ContainerElement;

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
