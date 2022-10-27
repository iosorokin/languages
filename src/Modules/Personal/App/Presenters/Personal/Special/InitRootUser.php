<?php

declare(strict_types=1);

namespace Modules\Personal\App\Presenters\Personal\Special;

use Modules\Personal\App\Validators\RegistrationCombinedValidator;
use Modules\Personal\Domain\Contexts\User;
use Modules\Personal\Domain\UserRepository;
use Modules\Personal\Domain\Values\Roles;

final class InitRootUser
{
    public function __construct(
        private RegistrationCombinedValidator $validator,
        private UserRepository                $repository,
    ) {}

    public function __invoke(array $attributes): User
    {
        $attributes = $this->validator->validate($attributes);
        $user = User::register($attributes);
        $user->setRoles((new Roles())->assignAsRoot());
        $this->repository->add($user);

        return $user;
    }
}
