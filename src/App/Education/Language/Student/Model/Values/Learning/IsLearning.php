<?php

namespace App\Education\Language\Student\Model\Values\Learning;

use Core\Base\Model\Values\ValueObject;

interface IsLearning extends ValueObject
{
    public function get(): bool;

    public function compare(IsLearning $isLearning): bool;
}
