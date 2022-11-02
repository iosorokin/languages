<?php

declare(strict_types=1);

namespace Domain\Personal\Values\Personality\Name;

use App\Values\BaseInvalidValueObject;
use App\Values\InvalidValueObject;

final class InvalidName extends BaseInvalidValueObject implements Name, InvalidValueObject
{

}
