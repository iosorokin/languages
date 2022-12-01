<?php

declare(strict_types=1);

namespace App\Education\Source\Shared\Domain\Model\Value;

use Core\Base\Model\Values\BaseInvalidValueObject;
use Core\Base\Model\Values\InvalidValueObject;

final class InvalidSourceType extends BaseInvalidValueObject implements SourceType, InvalidValueObject
{

}
