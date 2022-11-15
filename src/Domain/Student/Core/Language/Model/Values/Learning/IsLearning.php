<?php

namespace Domain\Student\Core\Language\Model\Values\Learning;

use App\Model\Values\ValueObject;

interface IsLearning extends ValueObject
{
    public function get(): bool;

    public function compare(IsLearning $isLearning): bool;
}
