<?php

declare(strict_types=1);

namespace Domain\Core\Source\Base\Model\Value;

use App\Base\Model\Values\BaseInvalidValueObject;
use App\Base\Model\Values\InvalidValueObject;

final class InvalidSourceType extends BaseInvalidValueObject implements SourceType, InvalidValueObject
{

}
