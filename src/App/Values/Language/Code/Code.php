<?php

namespace App\Values\Language\Code;

use App\Values\ValueObject;
use Stringable;

interface Code extends ValueObject, Stringable
{
    public function get(): string;

    public function compare(Code $code): bool;
}
