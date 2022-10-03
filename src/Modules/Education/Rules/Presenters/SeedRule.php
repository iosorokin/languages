<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Presenters;

use Modules\Education\Rules\Action\CreateRule;
use Modules\Education\Rules\Entities\Rule;
use Modules\Personal\Auth\Presenters\GetClientPresenter;
use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Presenters\Internal\GetUserPresenter;

final class SeedRule
{
    public function __construct(
        private GetUserPresenter $getUser,
        private GetClientPresenter $getClient,
        private CreateRule $createRule,
    ) {}

    public function __invoke(User|int $user, array $attributes): Rule
    {
        $user = is_int($user) ? ($this->getUser)($user) : $user;
        $client = ($this->getClient)($user);
        $rule = ($this->createRule)($client, $attributes);

        return $rule;
    }
}
