<?php

namespace App\Values\Description;

use App\Values\ValueObject;
use Stringable;

interface Description extends ValueObject, Stringable
{
    public function get(): ?string;

    public function compare(Description $description): bool;
}
