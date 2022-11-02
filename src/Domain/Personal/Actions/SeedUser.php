<?php

declare(strict_types=1);

namespace Domain\Personal\Actions;

use Domain\Personal\Domain\UserRepository;
use Domain\Personal\Entities\User;
use Domain\Personal\Values\Accesses\UnconfirmUser;

final class SeedUser
{
    public function __construct(
        private UserRepository $repository,
    ) {}

    public function __invoke(array $attributes): User
    {
        $user = User::make($attributes);
        if ($attributes['roles']) {
            $user->setAccesses(new UnconfirmUser($attributes['roles']));
        }
        $this->repository->add($user);

        return $user;
    }
}
