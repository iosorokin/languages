<?php

declare(strict_types=1);

namespace Modules\Personal\User\Presenters\Guest;

use Core\Base\Presenter;
use Modules\Notification\Mailer\Presenters\SendRegistrationEmailPresenter;
use Modules\Personal\User\Actions\CreateUser;
use Modules\Personal\User\Entities\User;

final class Register implements RegisterPresenter
{
    public function __construct(
        private CreateUser                     $createUser,
        private SendRegistrationEmailPresenter $sendRegistrationEmail,
    ) {}

    public function __invoke(array $attributes): User
    {
        $user = ($this->createUser)($attributes);
        ($this->sendRegistrationEmail)($user);

        return $user;
    }
}
