<?php

namespace App\Values\Security;

use App\Values\ValueObject;
use Stringable;

interface Password extends ValueObject, Stringable
{
    public function get(): string;

    public function check(Password $value): bool;
}
