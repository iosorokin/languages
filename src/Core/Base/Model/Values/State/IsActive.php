<?php

namespace Core\Base\Model\Values\State;

use Core\Base\Model\Values\ValueObject;

interface IsActive extends ValueObject
{
    public function get(): bool;

    public function compare(IsActive $isActive): bool;
}
