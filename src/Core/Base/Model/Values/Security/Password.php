<?php

namespace Core\Base\Model\Values\Security;

use Core\Base\Model\Values\ValueObject;
use Stringable;

interface Password extends ValueObject, Stringable
{
    public function get(): string;

    public function check(Password $value): bool;
}
