<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Services\Dispatcher;

use Modules\Internal\Container\Model\Container;
use Modules\Internal\Container\Presenters\GetContainer;

final class ContainerDispatcher
{
    public function __construct(
        private ContainerManipulator $manipulator,
        private GetContainer $getContainer,
    ) {}

    public function get(int $id): ?Container
    {
        $container = $this->getContainer->getOrThrowException($id);

        return $container;
    }

    public function manipulate(int|Container $container): ContainerManipulator
    {
        $container = is_int($container) ? $this->get($container) : $container;
        $this->manipulator->setContainer($container);

        return $this->manipulator;
    }
}
