<?php

declare(strict_types=1);

namespace WIP\Internal\Container\Presenters;

use Exception;
use Illuminate\Validation\ValidationException;
use WIP\Internal\Container\Model\Container;

final class GetContainer
{
    public function get(int $id): ?Container
    {
        return Container::find($id);
    }

    public function getOrThrowNotFound(int $id): Container
    {
        $container = $this->get($id);
        abort_if(! $container, 404);

        return $container;
    }

    public function getOrThrowBadRequest(int $id): Container
    {
        $container = $this->get($id);
        if (! $container) {
            throw ValidationException::withMessages([
                'container_id' => sprintf('Container id %d not found', $id)
            ]);
        }

        return $container;
    }

    public function getOrThrowException(int $id): Container
    {
        $container = $this->get($id);
        if (! $container) {
            throw new Exception(sprintf('Container with id %d not found', $id));
        }

        return $container;
    }
}
