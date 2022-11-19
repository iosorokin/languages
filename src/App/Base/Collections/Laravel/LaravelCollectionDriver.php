<?php

declare(strict_types=1);

namespace App\Base\Collections\Laravel;

use App\Base\Collections\CollectionDriver;
use Illuminate\Support\Collection;

final class LaravelCollectionDriver implements CollectionDriver
{
    private Collection $collection;

    public function __construct(array|Collection $items = [])
    {
        $this->collection = is_array($items) ? new Collection($items) : $items;
    }
    public function count(): int
    {
        return $this->collection->count();
    }

    public function each(callable $callback): self
    {
        $this->collection->each($callback);

        return $this;
    }
}
