<?php

declare(strict_types=1);

namespace Modules\Container\Presenters;

use Illuminate\Validation\ValidationException;
use Modules\Container\Repositories\ContainerRepository;
use Modules\Container\Entites\Container;

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
