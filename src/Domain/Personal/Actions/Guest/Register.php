<?php

declare(strict_types=1);

namespace Domain\Personal\Actions\Guest;

use Domain\Notification\Mailer\Application\Presenters\SendRegistrationEmail;
use Domain\Personal\Entities\User;
use Domain\Personal\Factories\Personal\RegistrationFactory;
use Domain\Personal\Repositories\PersonalRepository;

final class Register
{
    public function __construct(
        private RegistrationFactory   $registrationFactory,
        private SendRegistrationEmail $sendRegistrationEmail,
        private PersonalRepository    $repository,
    ) {}

    public function __invoke(RegisterRequest $request): User
    {
        [$personal, $errors] = $this->registrationFactory->createFromRequest($request);

        $user = User::make($this->registrationFactory);
        $this->repository->add($user);
        ($this->sendRegistrationEmail)($user);

        return $user;
    }
}
