<?php

declare(strict_types=1);

namespace App\Controllers\Personal\Guest;

use App\Database\Personal\UserRepository;
use Modules\Notification\Mailer\Presenters\SendRegistrationEmail;
use Modules\Personal\Actions\CreateUser;
use Modules\Personal\Entity\User;
use Modules\Personal\Validators\RegistrationCombinedValidator;

final class Register
{
    public function __construct(
        private RegistrationCombinedValidator $validator,
        private CreateUser $createUser,
        private UserRepository $repository,
        private SendRegistrationEmail         $sendRegistrationEmail,
    ) {}

    public function __invoke(array $attributes): User
    {
        $attributes = $this->validator->validate($attributes);
        $user = ($this->createUser)($attributes);
        $this->repository->add($user);
        ($this->sendRegistrationEmail)($user);

        return $user;
    }
}
