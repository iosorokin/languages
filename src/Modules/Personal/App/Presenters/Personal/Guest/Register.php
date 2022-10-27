<?php

declare(strict_types=1);

namespace Modules\Personal\App\Presenters\Personal\Guest;

use Modules\Notification\Mailer\Application\Presenters\SendRegistrationEmail;
use Modules\Personal\App\Validators\RegistrationCombinedValidator;
use Modules\Personal\Domain\Contexts\User;
use Modules\Personal\Domain\UserRepository;

final class Register
{
    public function __construct(
        private RegistrationCombinedValidator $validator,
        private SendRegistrationEmail         $sendRegistrationEmail,
        private UserRepository                $repository,
    ) {}

    public function __invoke(array $attributes): User
    {
        $attributes = $this->validator->validate($attributes);
        $user = User::register($attributes);
        $this->repository->add($user);
        ($this->sendRegistrationEmail)($user);

        return $user;
    }
}
