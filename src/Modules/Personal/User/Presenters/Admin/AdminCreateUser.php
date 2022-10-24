<?php

declare(strict_types=1);

namespace Modules\Personal\User\Presenters\Admin;

use Modules\Personal\User\Model\User;
use Modules\Personal\User\Presenters\Mixins\CreateUser;
use Modules\Personal\User\Validators\RegistrationCombinedValidator;
use Modules\Personal\User\Validators\Single\RolesValidator;

final class AdminCreateUser
{
    public function __construct(
        private CreateUser $createUser,
        private RegistrationCombinedValidator $validator,
    ) {}

    public function __invoke(array $attributes): User
    {
        $this->validator->add(RolesValidator::class);
        $attributes = $this->validator->validate($attributes);
        $user = ($this->createUser)($attributes);

        return $user;
    }
}
