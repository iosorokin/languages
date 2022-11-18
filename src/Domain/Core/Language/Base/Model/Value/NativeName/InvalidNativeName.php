<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Model\Value\NativeName;

use App\Model\Values\BaseInvalidValueObject;
use App\Model\Values\InvalidValueObject;

final class InvalidNativeName extends BaseInvalidValueObject implements NativeName, InvalidValueObject
{

}
