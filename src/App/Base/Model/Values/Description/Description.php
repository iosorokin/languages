<?php

namespace App\Base\Model\Values\Description;

use App\Base\Model\Values\ValueObject;
use Stringable;

interface Description extends ValueObject, Stringable
{
    public function get(): ?string;

    public function compare(Description $description): bool;
}
