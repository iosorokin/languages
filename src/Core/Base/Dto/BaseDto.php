<?php

declare(strict_types=1);

namespace Core\Base\Dto;

use Core\Base\Mixins\ToArray;

abstract class BaseDto implements Dto
{
    use ToArray;
}
