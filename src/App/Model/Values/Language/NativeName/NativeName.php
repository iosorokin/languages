<?php

namespace App\Model\Values\Language\NativeName;

use App\Model\Values\ValueObject;
use Stringable;

interface NativeName extends ValueObject, Stringable
{
    public function get(): string;

    public function compare(NativeName $nativeName): bool;
}
