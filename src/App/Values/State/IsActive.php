<?php

declare(strict_types=1);

namespace App\Values\State;

final class IsActive
{
    private bool $isActive;

    public function __construct(mixed $isActive)
    {
        $this->isActive = $isActive;
    }

    public function value(): bool
    {
        return $this->isActive;
    }
}
