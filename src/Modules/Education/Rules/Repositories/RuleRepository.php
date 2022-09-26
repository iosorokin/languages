<?php

namespace Modules\Education\Rules\Repositories;

use Modules\Education\Rules\Structures\RuleStructure;

interface RuleRepository
{
    public function save(RuleStructure $rule): void;
}
