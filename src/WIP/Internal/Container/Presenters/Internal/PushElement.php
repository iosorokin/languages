<?php

declare(strict_types=1);

namespace WIP\Internal\Container\Presenters\Internal;

use WIP\Internal\Container\Contracts\ContainerableElement;
use WIP\Internal\Container\Model\Container;
use WIP\Internal\Container\Model\ContainerElement;
use WIP\Internal\Container\Presenters\GetContainer;
use WIP\Internal\Container\Services\Dispatcher\ContainerDispatcher;

final class PushElement
{
    public function __construct(
        private GetContainer $getContainer,
        private ContainerDispatcher $containerDispatcher,
    ) {}

    public function __invoke(Container|int $container, ContainerableElement $containerableElement): ContainerElement
    {
        $container = is_int($container) ? ($this->getContainer)->getOrThrowBadRequest($container) : $container;
        $manipulator = $this->containerDispatcher->manipulate($container);
        $element = $manipulator->push($containerableElement);

        return $element;
    }
}
