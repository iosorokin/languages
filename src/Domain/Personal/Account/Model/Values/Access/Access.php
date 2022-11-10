<?php

namespace Domain\Personal\Account\Model\Values\Access;

use App\Model\Values\ValueObject;

interface Access extends ValueObject
{
    public function isEnable(): bool;

    public function isDisable(): bool;

    public function compare(Access $access): bool;
}
