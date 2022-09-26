<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Repositories;

use App\Extensions\Assert;
use Modules\Education\Rules\Structures\RuleModel;
use Modules\Education\Rules\Structures\RuleStructure;

final class EloquentRuleRepository implements RuleRepository
{
    public function save(RuleStructure $rule): void
    {
        Assert::isInstanceOf($rule, RuleModel::class);
        $rule->save();
    }
}
