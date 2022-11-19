<?php

namespace App\Base\Model\Values\State;

use App\Base\Model\Values\ValueObject;

interface IsActive extends ValueObject
{
    public function get(): bool;

    public function compare(IsActive $isActive): bool;
}
