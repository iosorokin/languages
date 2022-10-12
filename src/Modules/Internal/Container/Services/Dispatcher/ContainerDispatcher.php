<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Services\Dispatcher;

use Modules\Internal\Container\Structures\Container;
use Modules\Internal\Container\Repositories\ContainerRepository;
use Modules\Internal\Container\Services\Dispatcher\Exceptions\ContainerNotFound;

final class ContainerDispatcher
{
    public function __construct(
        private ContainerManipulator $manipulator,
        private ContainerRepository $repository,
    ) {}

    public function get(int $id): ?Container
    {
        $container = $this->repository->get($id);
        throw_if(! $container, new ContainerNotFound($id));

        return $container;
    }

    public function add(Container $container): void
    {
        $this->repository->save($container);
    }

    public function manipulate(int|Container $container): ContainerManipulator
    {
        $container = is_int($container) ? $this->get($container) : $container;
        $this->manipulator->setContainer($container);

        return $this->manipulator;
    }
}
