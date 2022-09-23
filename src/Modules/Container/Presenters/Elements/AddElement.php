<?php

declare(strict_types=1);

namespace Modules\Container\Presenters\Elements;

use Modules\Container\Actions\ContainerDispatcher;
use Modules\Container\Contracts\ContainerableElement;
use Modules\Container\Structures\ContainerElementStructure;
use Modules\Container\Structures\ContainerStructure;

final class AddElement
{
    public function __construct(
        private ContainerDispatcher $dispatcher,
    ) {}

    public function __invoke(ContainerStructure $container, ContainerableElement $element): ContainerElementStructure
    {
        return $this->dispatcher->setContainer($container)
            ->push($element);
    }
}
