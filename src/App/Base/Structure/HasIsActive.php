<?php

namespace App\Base\Structure;

interface HasIsActive
{
    public function setIsActive(bool $isActive): self;

    public function isActive(): bool;
}
