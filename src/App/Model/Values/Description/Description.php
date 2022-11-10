<?php

namespace App\Model\Values\Description;

use App\Model\Values\ValueObject;
use Stringable;

interface Description extends ValueObject, Stringable
{
    public function get(): ?string;

    public function compare(Description $description): bool;
}
