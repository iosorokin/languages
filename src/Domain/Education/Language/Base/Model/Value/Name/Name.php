<?php

namespace Domain\Education\Language\Base\Model\Value\Name;

use Core\Base\Model\Values\ValueObject;
use Stringable;

interface Name extends ValueObject, Stringable
{
    public function get(): string;

    public function compare(Name $name): bool;
}
