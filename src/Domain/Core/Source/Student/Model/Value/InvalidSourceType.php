<?php

declare(strict_types=1);

namespace Domain\Core\Source\Student\Model\Value;

use App\Model\Values\BaseInvalidValueObject;
use App\Model\Values\InvalidValueObject;

final class InvalidSourceType extends BaseInvalidValueObject implements SourceType, InvalidValueObject
{

}
