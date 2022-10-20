<?php

declare(strict_types=1);

namespace App\Filters;

final class IsActive
{
    public function __construct(
        private int $isActive
    ) {}
}
