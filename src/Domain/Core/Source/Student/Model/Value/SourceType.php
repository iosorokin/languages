<?php

namespace Domain\Core\Source\Student\Model\Value;

use App\Model\Values\ValueObject;

interface SourceType extends ValueObject
{
    public function get(): string;
}
