<?php

declare(strict_types=1);

namespace Modules\Personal\User\Presenters\Admin;

use Modules\Personal\User\Actions\CreateUser;
use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Policy\AdminUserPolicy;

final class AdminCreateUser implements AdminCreateUserPresenter
{
    public function __construct(
        private AdminUserPolicy $policy,
        private CreateUser $createUser,
    ) {}

    public function __invoke(array $attributes): User
    {
        $this->policy->canCreate();
        $user = ($this->createUser)($attributes);

        return $user;
    }
}
