<?php

namespace Domain\Core\Source\Base\Model\Value;

use App\Base\Model\Values\ValueObject;

interface SourceType extends ValueObject
{
    public function get(): string;
}
