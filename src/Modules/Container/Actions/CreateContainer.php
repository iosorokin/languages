<?php

declare(strict_types=1);

namespace Modules\Container\Actions;

use Modules\Container\Contracts\Containerable;
use Modules\Container\Entites\Container;
use Modules\Container\Factories\ContainerFactory;
use Modules\Container\Repository\ContainerRepository;
use Modules\Container\Validators\CreateContainerValidator;

final class CreateContainer
{
    public function __construct(
        private CreateContainerValidator $validator,
        private ContainerFactory $factory,
        private ContainerRepository $repository,
    ) {}

    public function __invoke(Containerable $containerable, array $attributes): Container
    {
        $attributes = $this->validator->validate($attributes);
        $container = $this->factory->create($containerable, $attributes);
        $this->repository->save($container);

        return $container;
    }
}
