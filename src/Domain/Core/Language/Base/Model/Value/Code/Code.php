<?php

namespace Domain\Core\Language\Base\Model\Value\Code;

use App\Model\Values\ValueObject;
use Stringable;

interface Code extends ValueObject, Stringable
{
    public function get(): string;

    public function compare(Code $code): bool;
}
