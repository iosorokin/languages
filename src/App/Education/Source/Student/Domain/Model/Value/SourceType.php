<?php

namespace App\Education\Source\Student\Domain\Model\Value;

use Core\Base\Model\Values\ValueObject;

interface SourceType extends ValueObject
{
    public function get(): string;
}
