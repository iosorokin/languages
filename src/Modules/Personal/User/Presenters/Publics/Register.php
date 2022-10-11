<?php

declare(strict_types=1);

namespace Modules\Personal\User\Presenters\Publics;

use Modules\Notification\Mailer\Presenters\SendRegistrationEmailPresenter;
use Modules\Personal\User\Actions\CreateUser;
use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Validators\RegistrationCombinedValidator;

final class Register implements RegisterPresenter
{
    public function __construct(
        private RegistrationCombinedValidator  $validator,
        private CreateUser                     $createUser,
        private SendRegistrationEmailPresenter $sendRegistrationEmail,
    ) {}

    public function __invoke(array $attributes): User
    {
        $attributes = $this->validator->validate($attributes);
        $user = ($this->createUser)($attributes);
        ($this->sendRegistrationEmail)($user);

        return $user;
    }
}
