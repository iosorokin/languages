<?php

namespace Modules\Education\Rules\Repositories;

use Modules\Education\Rules\Entities\Rule;

interface RuleRepository
{
    public function save(Rule $rule): void;

    public function get(int $id): ?Rule;
}
