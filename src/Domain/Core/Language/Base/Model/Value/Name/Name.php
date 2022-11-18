<?php

namespace Domain\Core\Language\Base\Model\Value\Name;

use App\Model\Values\ValueObject;
use Stringable;

interface Name extends ValueObject, Stringable
{
    public function get(): string;

    public function compare(Name $name): bool;
}
