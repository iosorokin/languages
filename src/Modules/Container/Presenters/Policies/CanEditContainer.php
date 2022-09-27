<?php

declare(strict_types=1);

namespace Modules\Container\Presenters\Policies;

use Modules\Container\Repository\ContainerRepository;
use Modules\Container\Structures\ContainerStructure;
use Modules\Personal\User\Contracts\Userable;

final class CanEditContainer implements CanEditContainerPresenter
{
    public function __construct(
        private ContainerRepository $repository,
    ) {}

    public function __invoke(Userable $userable, ContainerStructure|int $container): ContainerStructure
    {
        $container = is_int($container) ? $this->repository->getContainerWithDependenses($container): $container;

        return $container;
    }
}
