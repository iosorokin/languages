<?php

declare(strict_types=1);

namespace Domain\Internal\Container\Presenters\Internal;

use Domain\Internal\Container\Contracts\ContainerableElement;
use Domain\Internal\Container\Model\Container;
use Domain\Internal\Container\Presenters\GetContainer;
use Domain\Internal\Container\Model\ContainerElement;
use Domain\Internal\Container\Services\Dispatcher\ContainerDispatcher;

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
