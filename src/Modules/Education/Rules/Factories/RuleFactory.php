<?php

namespace Modules\Education\Rules\Factories;

use Modules\Education\Rules\Entities\Rule;
use Modules\Languages\Entities\Language;
use Modules\Personal\User\Entities\User;

interface RuleFactory
{
    public function create(User $user, Language $language, array $attributes): Rule;
}
