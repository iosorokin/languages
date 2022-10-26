<?php

declare(strict_types=1);

namespace App\Controllers\Personal;

use App\Database\Personal\UserRepository;
use Modules\Personal\Actions\CreateUser;
use Modules\Personal\Entity\User;

final class SeedUser
{
    public function __construct(
        private CreateUser $createUser,
        private UserRepository $repository,
    ) {}

    public function __invoke(array $attributes): User
    {
        $user = ($this->createUser)($attributes);
        $this->repository->add($user);

        return $user;
    }
}
