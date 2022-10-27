<?php

declare(strict_types=1);

namespace Modules\Personal\App\Presenters\Personal;

use Modules\Personal\Domain\Contexts\User;
use Modules\Personal\Domain\UserRepository;
use Modules\Personal\Domain\Values\Roles;

final class SeedUser
{
    public function __construct(
        private UserRepository $repository,
    ) {}

    public function __invoke(array $attributes): User
    {
        $user = User::register($attributes);
        if ($attributes['roles']) {
            $user->setRoles(new Roles($attributes['roles']));
        }
        $this->repository->add($user);

        return $user;
    }
}
