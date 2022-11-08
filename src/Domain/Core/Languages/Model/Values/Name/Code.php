<?php

namespace Domain\Core\Languages\Model\Values\Name;

use App\Values\ValueObject;
use Stringable;

interface Code extends ValueObject, Stringable
{
    public function get(): string;

    public function compare(Code $code): bool;
}
