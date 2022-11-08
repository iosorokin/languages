<?php

namespace Domain\Core\Languages\Model\Values\Name;

use App\Values\ValueObject;
use Stringable;

interface Name extends ValueObject, Stringable
{
    public function get(): string;

    public function compare(Name $name): bool;
}
