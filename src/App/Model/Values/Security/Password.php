<?php

namespace App\Model\Values\Security;

use App\Model\Values\ValueObject;
use Stringable;

interface Password extends ValueObject, Stringable
{
    public function get(): string;

    public function check(Password $value): bool;
}
