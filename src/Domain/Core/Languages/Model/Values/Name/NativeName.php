<?php

namespace Domain\Core\Languages\Model\Values\Name;

use App\Values\ValueObject;
use Stringable;

interface NativeName extends ValueObject, Stringable
{
    public function get(): string;

    public function compare(NativeName $nativeName): bool;
}
