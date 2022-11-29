<?php

namespace Core\Base\Model\Values\Description;

use Core\Base\Model\Values\ValueObject;
use Stringable;

interface Description extends ValueObject, Stringable
{
    public function get(): ?string;

    public function compare(Description $description): bool;
}
