<?php

declare(strict_types=1);

namespace Core\Base\Collections;

class Collection implements CollectionInterface
{
    private array $wrappers;

    private CollectionDriver $collection;

    public function __construct(mixed $items = [])
    {
        $this->collection = app()->make(CollectionDriver::class, [
            'items' => $items,
        ]);
    }

    public function addWrapper(callable $callback): self
    {
        $this->wrappers[] = $callback;

        return $this;
    }

    public function count(): int
    {
        return $this->collection->count();
    }
}
