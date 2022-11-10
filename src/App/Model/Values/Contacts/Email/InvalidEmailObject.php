<?php

declare(strict_types=1);

namespace App\Model\Values\Contacts\Email;

use App\Model\Values\BaseInvalidValueObject;
use App\Model\Values\InvalidValueObject;

final class InvalidEmailObject extends BaseInvalidValueObject implements Email, InvalidValueObject
{

}
