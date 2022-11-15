<?php

declare(strict_types=1);

namespace App\Base\Collections;

abstract class BaseReadOnlyCollection
{
    public function __construct(
        private array $collection
    ) {}


}
