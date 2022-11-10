<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Model\Values\Password;

use App\Model\Values\BaseInvalidValueObject;
use App\Model\Values\InvalidValueObject;
use App\Model\Values\Security\Password;

final class InvalidPasswordObject extends BaseInvalidValueObject implements Password, InvalidValueObject
{
    public function check(Password $value): bool
    {
        $this->get();
    }
}
