<?php

declare(strict_types=1);

namespace Modules\Personal\User\Presenters\Special;

use Modules\Personal\User\Model\User;
use Modules\Personal\User\Presenters\Mixins\CreateUser;
use Modules\Personal\User\Validators\RegistrationCombinedValidator;

final class InitRootUser
{
    public function __construct(
        private CreateUser $createUser,
        private RegistrationCombinedValidator $validator,
    ) {}

    public function __invoke(array $attributes): User
    {
        $attributes = $this->validator->validate($attributes);
        $attributes['roles'] = ['root'];
        $user = ($this->createUser)($attributes);

        return $user;
    }
}
