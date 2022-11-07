<?php

declare(strict_types=1);

namespace Domain\Account\Model\Entities\BaseAuth\Policies;

use App\Exceptions\InvalidArgumentException;
use Domain\Account\Repositories\AccountRepository;

final class CheckEmailDoesNotExist
{
    public function __construct(
        private AccountRepository $repository
    ) {}

    public function __invoke(string $email)
    {
        if ($this->repository->hasEmail($email)) {
            throw new InvalidArgumentException('email', 'personal.email_exist');
        }
    }
}
