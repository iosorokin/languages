<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Presenters\User;

use Modules\Education\Rules\Actions\CreateRule;
use Modules\Education\Rules\Entities\Rule;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class UserCreateRule implements UserCreateRulePresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private CreateRule $createRule,
    ) {}

    public function __invoke(array $attributes): Rule
    {
        $client = ($this->getClient)();
        $rule = ($this->createRule)($client, $attributes);

        return $rule;
    }
}
