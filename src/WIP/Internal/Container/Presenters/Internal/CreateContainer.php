<?php

declare(strict_types=1);

namespace WIP\Internal\Container\Presenters\Internal;

use WIP\Internal\Container\Contracts\Containerable;
use WIP\Internal\Container\Factories\ContainerFactory;
use WIP\Internal\Container\Model\Container;
use WIP\Internal\Container\Validators\CreateContainerValidator;

final class CreateContainer
{
    public function __construct(
        private CreateContainerValidator $validator,
        private ContainerFactory $factory,
    ) {}

    public function __invoke(Containerable $containerable, array $attributes): Container
    {
        $attributes = $this->validator->validate($attributes);
        $container = $this->factory->create($containerable, $attributes);
        $container->save();

        return $container;
    }
}
