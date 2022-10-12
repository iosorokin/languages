<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Factories;

use Modules\Internal\Container\Contracts\ContainerableElement;
use Modules\Internal\Container\Structures\Container;
use Modules\Internal\Container\Structures\ContainerElement;
use Modules\Internal\Container\Structures\ContainerElementModel;

final class ModelContainerElementFactory implements ContainerElementFactory
{
    public function create(Container $container, ContainerableElement $element): ContainerElement
    {
        $model = new ContainerElementModel();
        $model->setContainer($container);
        $model->setElement($element);

        return $model;
    }
}
