<?php

declare(strict_types=1);

namespace Core\Base\Model;

use Core\Base\Event\Event;
use Core\Base\Event\Eventable;
use Core\Base\Mixins\HasEvents;
use Core\Base\Mixins\HasValueObjectValidation;
use Core\Base\Model\Values\InvalidValueObject;
use Illuminate\Support\Str;

abstract class Entity implements Eventable
{
    use HasEvents;
    use HasValueObjectValidation;
}
