<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Factories;

use Modules\Education\Rules\Entities\Rule;
use Modules\Education\Rules\Entities\RuleModel;
use Modules\Languages\Entities\Language;
use Modules\Personal\User\Entities\User;

final class ModelRuleFactory implements RuleFactory
{
    public function create(User $user, Language $language, array $attributes): Rule
    {
        $rule = new RuleModel();
        $rule->setUser($user);
        $rule->setLanguage($language);
        $rule->setDescription($attributes['description']);
        $rule->setTitle($attributes['title']);

        return $rule;
    }
}
