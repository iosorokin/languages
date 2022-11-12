<?php

namespace App\Model\Values\State;

use App\Model\Values\ValueObject;

interface IsActive extends ValueObject
{
    public function get(): bool;

    public function compare(IsActive $isActive): bool;
}
