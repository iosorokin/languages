<?php

namespace App\Education\Language\Base\Model\Value\Code;

use Core\Base\Model\Values\ValueObject;
use Stringable;

interface Code extends ValueObject, Stringable
{
    public function get(): string;

    public function compare(Code $code): bool;
}
