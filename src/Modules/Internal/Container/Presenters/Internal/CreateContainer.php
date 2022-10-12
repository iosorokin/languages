<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Presenters\Internal;

use Modules\Internal\Container\Contracts\Containerable;
use Modules\Internal\Container\Structures\Container;
use Modules\Internal\Container\Factories\ContainerFactory;
use Modules\Internal\Container\Repositories\ContainerRepository;
use Modules\Internal\Container\Validators\CreateContainerValidator;

final class CreateContainer implements CreateContainerPresenter
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
        $containerable->setContainer($container);

        return $container;
    }
}
