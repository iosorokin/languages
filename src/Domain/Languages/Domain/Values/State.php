<?php

declare(strict_types=1);

namespace Domain\Languages\Domain\Values;

use App\Values\State\IsActive;

final class State
{
    public function __construct(
        private IsActive $isActive
    ) {}

    /**
     * @param IsActive $isActive
     */
    public function setIsActive(IsActive $isActive): void
    {
        $this->isActive = $isActive;
    }

    /**
     * @return IsActive
     */
    public function isActive(): IsActive
    {
        return $this->isActive;
    }
}
