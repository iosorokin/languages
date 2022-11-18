<?php

namespace Domain\Core\Language\Base\Model\Value\NativeName;

use App\Model\Values\ValueObject;
use Stringable;

interface NativeName extends ValueObject, Stringable
{
    public function get(): string;

    public function compare(NativeName $nativeName): bool;
}
