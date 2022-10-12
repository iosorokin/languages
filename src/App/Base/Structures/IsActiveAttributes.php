<?php

namespace App\Base\Structures;

trait IsActiveAttributes
{
    public function setIsActive(bool $isActive): self
    {
        $this->is_active = $isActive;

        return $this;
    }

    public function isActive(): bool
    {
        return $this->is_active;
    }
}
