<?php

declare(strict_types=1);

namespace App\Base\Collections;

use Illuminate\Support\Collection as LaravelCollection;

abstract class BaseReadOnlyCollection
{
    public function __construct(
        private LaravelCollection $collection
    ) {}
}
