<?php

namespace App\Model\Values\Language\Code;

use App\Model\Values\ValueObject;
use Stringable;

interface Code extends ValueObject, Stringable
{
    public function get(): string;

    public function compare(Code $code): bool;
}
