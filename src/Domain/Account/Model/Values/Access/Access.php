<?php

namespace Domain\Account\Model\Values\Access;

use App\Values\ValueObject;

interface Access extends ValueObject
{
    public function isEnable(): bool;

    public function isDisable(): bool;

    public function compare(Access $access): bool;
}
