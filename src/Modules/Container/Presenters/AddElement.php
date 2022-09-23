<?php

declare(strict_types=1);

namespace Modules\Container\Presenters;

use Modules\Container\Contracts\ContainerableElement;
use Modules\Container\Structures\ContainerElementModel;
use Modules\Container\Structures\ContainerElementsStructure;
use Modules\Container\Structures\ContainerStructure;

final class AddElement
{
    public function __construct()
    {
    }

    public function __invoke(ContainerStructure $container, ContainerableElement $element)
    {
        $containerElement = $this->createStructure($container, $element);
    }

    private function createStructure(ContainerStructure $container, ContainerableElement $element): ContainerElementsStructure
    {
        $structure = new ContainerElementModel();
        $structure->setContainer($container);
        $structure->setElement($element);

        return $structure;
    }
}
