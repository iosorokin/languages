<?php

namespace Modules\Domain\Sources\Policies;

use Modules\Domain\Sources\Structures\Source;

interface SourcePolicy
{
    public function canTakeToWork(Source $source): void;
}
