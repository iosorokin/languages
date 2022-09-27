<?php

declare(strict_types=1);

namespace Modules\Container\Presenters;

use Modules\Container\Repository\ContainerRepository;
use Modules\Container\Structures\ContainerStructure;

final class GetContainer implements GetContainerPresenter
{
    public function __construct(
        private ContainerRepository $repository,
    ) {}

    public function __invoke(int $id): ContainerStructure
    {
        return $this->repository->getContainer($id);
    }
}
