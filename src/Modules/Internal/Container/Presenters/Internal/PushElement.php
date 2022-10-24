<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Presenters\Internal;

use Modules\Internal\Container\Contracts\ContainerableElement;
use Modules\Internal\Container\Model\Container;
use Modules\Internal\Container\Presenters\GetContainer;
use Modules\Internal\Container\Model\ContainerElement;
use Modules\Internal\Container\Services\Dispatcher\ContainerDispatcher;

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
