<?php

namespace Domain\Education\Language\Base\Model\Value\NativeName;

use Core\Base\Model\Values\ValueObject;
use Stringable;

interface NativeName extends ValueObject, Stringable
{
    public function get(): string;

    public function compare(NativeName $nativeName): bool;
}
