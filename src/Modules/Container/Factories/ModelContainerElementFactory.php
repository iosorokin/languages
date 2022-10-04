<?php

declare(strict_types=1);

namespace Modules\Container\Factories;

use Modules\Container\Contracts\ContainerableElement;
use Modules\Container\Entites\Container;
use Modules\Container\Entites\ContainerElement;
use Modules\Container\Entites\ContainerElementModel;

final class ModelContainerElementFactory implements ContainerElementFactory
{
    public function create(Container $container, ContainerableElement $element): ContainerElement
    {
        $structure = new ContainerElementModel();
        $structure->setContainer($container);
        $structure->setElement($element);

        return $structure;
    }
}
