<?php

declare(strict_types=1);

namespace Domain\Internal\Container\Presenters\Internal;

use Domain\Internal\Container\Contracts\Containerable;
use Domain\Internal\Container\Model\Container;
use Domain\Internal\Container\Factories\ContainerFactory;
use Domain\Internal\Container\Validators\CreateContainerValidator;

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
