<?php

namespace Core\Domain\Models\Value;

use Core\Base\Model\Values\ValueObject;

interface SourceType extends ValueObject
{
    public function get(): string;
}
