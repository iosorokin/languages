<?php

declare(strict_types=1);

namespace Modules\Container\Factories;

use Modules\Container\Contracts\ContainerableElement;
use Modules\Container\Structures\ContainerElementModel;
use Modules\Container\Structures\ContainerElementStructure;
use Modules\Container\Structures\ContainerStructure;

final class ContainerElementFactory
{
    public function create(ContainerStructure $container, ContainerableElement $element): ContainerElementStructure
    {
        $structure = new ContainerElementModel();
        $structure->setContainer($container);
        $structure->setElement($element);

        return $structure;
    }
}
