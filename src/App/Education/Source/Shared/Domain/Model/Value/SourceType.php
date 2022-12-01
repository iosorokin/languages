<?php

namespace App\Education\Source\Shared\Domain\Model\Value;

use Core\Base\Model\Values\ValueObject;

interface SourceType extends ValueObject
{
    public function get(): string;
}
