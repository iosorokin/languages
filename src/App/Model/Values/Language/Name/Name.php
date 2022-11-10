<?php

namespace App\Model\Values\Language\Name;

use App\Model\Values\ValueObject;
use Stringable;

interface Name extends ValueObject, Stringable
{
    public function get(): string;

    public function compare(Name $name): bool;
}
