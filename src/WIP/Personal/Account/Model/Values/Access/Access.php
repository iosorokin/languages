<?php

namespace WIP\Personal\Account\Model\Values\Access;

use App\Base\Model\Values\ValueObject;

interface Access extends ValueObject
{
    public function isEnable(): bool;

    public function isDisable(): bool;

    public function compare(Access $access): bool;
}
