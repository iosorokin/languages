<?php

declare(strict_types=1);

namespace Core\Base\Collections;

use Illuminate\Support\Collection as LaravelCollection;

abstract class Collection
{
    public function __construct(
        private LaravelCollection $collection,
    ) {}
}
