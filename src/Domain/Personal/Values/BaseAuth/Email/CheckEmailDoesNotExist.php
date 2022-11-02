<?php

declare(strict_types=1);

namespace Domain\Personal\Values\BaseAuth\Email;

use App\Exceptions\InvalidArgumentException;
use Domain\Personal\PersonalRepository;

final class CheckEmailDoesNotExist
{
    public function __construct(
        private PersonalRepository $repository
    ) {}

    public function __invoke(string $email)
    {
        if ($this->repository->hasEmail($email)) {
            throw new InvalidArgumentException('email', 'personal.email_exist');
        }
    }
}
