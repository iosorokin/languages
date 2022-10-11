<?php

declare(strict_types=1);

namespace Modules\Personal\User\Presenters\Admin;

use Modules\Personal\Permissions\Validators\PermissionsValidator;
use Modules\Personal\User\Actions\CreateUser;
use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Policy\UserPolicy;
use Modules\Personal\User\Validators\RegistrationCombinedValidator;

final class AdminCreateUser implements AdminCreateUserPresenter
{
    public function __construct(
        private UserPolicy $policy,
        private CreateUser $createUser,
        private RegistrationCombinedValidator $validator,
    ) {}

    public function __invoke(array $attributes): User
    {
        $this->validator->add(PermissionsValidator::class);
        $attributes = $this->validator->validate($attributes);
        $this->policy->canCreate();
        $user = ($this->createUser)($attributes);

        return $user;
    }
}
