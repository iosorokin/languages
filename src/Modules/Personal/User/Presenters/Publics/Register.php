<?php

declare(strict_types=1);

namespace Modules\Personal\User\Presenters\Publics;

use Modules\Notification\Mailer\Presenters\SendRegistrationEmail;
use Modules\Personal\User\Model\User;
use Modules\Personal\User\Presenters\Mixins\CreateUser;
use Modules\Personal\User\Validators\RegistrationCombinedValidator;

final class Register
{
    public function __construct(
        private RegistrationCombinedValidator  $validator,
        private CreateUser                     $createUser,
        private SendRegistrationEmail $sendRegistrationEmail,
    ) {}

    public function __invoke(array $attributes): User
    {
        $attributes = $this->validator->validate($attributes);
        $user = ($this->createUser)($attributes);
        ($this->sendRegistrationEmail)($user);

        return $user;
    }
}
