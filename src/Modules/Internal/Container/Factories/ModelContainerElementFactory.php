<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Factories;

use Modules\Internal\Container\Contracts\ContainerableElement;
use Modules\Internal\Container\Entites\Container;
use Modules\Internal\Container\Entites\ContainerElement;
use Modules\Internal\Container\Entites\ContainerElementModel;

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
