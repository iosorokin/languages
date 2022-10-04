<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Repositories;

use App\Extensions\Assert;
use Modules\Education\Rules\Entities\RuleModel;
use Modules\Education\Rules\Entities\Rule;

final class EloquentRuleRepository implements RuleRepository
{
    public function save(Rule $rule): void
    {
        Assert::isInstanceOf($rule, RuleModel::class);
        $rule->save();
    }

    public function get(int $id): ?Rule
    {
        return RuleModel::find($id);
    }
}
