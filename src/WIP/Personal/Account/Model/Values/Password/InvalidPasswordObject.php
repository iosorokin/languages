<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Model\Values\Password;

use App\Base\Model\Values\BaseInvalidValueObject;
use App\Base\Model\Values\InvalidValueObject;
use App\Base\Model\Values\Security\Password;

final class InvalidPasswordObject extends BaseInvalidValueObject implements Password, InvalidValueObject
{
    public function check(Password $value): bool
    {
        $this->get();
    }
}
