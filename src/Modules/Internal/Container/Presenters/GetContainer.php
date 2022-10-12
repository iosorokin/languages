<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Presenters;

use Illuminate\Validation\ValidationException;
use Modules\Internal\Container\Structures\Container;
use Modules\Internal\Container\Repositories\ContainerRepository;

final class GetContainer implements GetContainerPresenter
{
    public function __construct(
        private ContainerRepository $repository,
    ) {}

    public function getOrThrowNotFound(int $id): Container
    {
        $container = $this->repository->get($id);
        abort_if(! $container, 404);

        return $container;
    }

    public function getOrThrowBadRequest(int $id): Container
    {
        $container = $this->repository->get($id);
        if (! $container) {
            throw ValidationException::withMessages([
                'container_id' => sprintf('Container id %d not found', $id)
            ]);
        }

        return $container;
    }
}
