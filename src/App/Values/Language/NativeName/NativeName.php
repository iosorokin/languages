<?php

namespace App\Values\Language\NativeName;

use App\Values\ValueObject;
use Stringable;

interface NativeName extends ValueObject, Stringable
{
    public function get(): string;

    public function compare(NativeName $nativeName): bool;
}
