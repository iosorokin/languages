<?php

declare(strict_types=1);

namespace App\Base\Collections;

class ReadonlyCollection
{
    private CollectionDriver $collection;

    public function __construct(array $items = [])
    {
        $this->collection = app()->make(CollectionDriver::class, [
            'items' => $items,
        ]);
    }
}
