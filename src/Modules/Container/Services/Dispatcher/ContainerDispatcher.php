<?php

declare(strict_types=1);

namespace Modules\Container\Services\Dispatcher;

use Modules\Container\Entites\Container;
use Modules\Container\Repositories\ContainerRepository;
use Modules\Container\Services\Dispatcher\Exceptions\ContainerNotFound;

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

    public function load(int $id): ContainerManipulator
    {
        return $this->manipulate($this->get($id));
    }

    public function manipulate(Container $container): ContainerManipulator
    {
        $this->manipulator->setContainer($container);

        return $this->manipulator;
    }
}
