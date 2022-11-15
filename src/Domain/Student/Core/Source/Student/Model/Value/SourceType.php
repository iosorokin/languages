<?php

namespace Domain\Student\Core\Source\Student\Model\Value;

use App\Model\Values\ValueObject;
use Domain\Student\Core\Source\Student\Model\Enum\SourceTypeEnum;

interface SourceType extends ValueObject
{
    public function get(): SourceTypeEnum;
}
