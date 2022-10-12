<?php

namespace App\Base\Structures;

interface HasIsActive
{
    public function setIsActive(bool $isActive): self;

    public function isActive(): bool;
}
