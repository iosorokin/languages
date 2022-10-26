<?php

declare(strict_types=1);

namespace App\Controllers\Personal\Special;

use App\Database\Personal\UserRepository;
use Modules\Personal\Actions\CreateUser;
use Modules\Personal\Entity\User;
use Modules\Personal\Validators\RegistrationCombinedValidator;
use Modules\Personal\Values\Roles;

final class InitRootUser
{
    public function __construct(
        private CreateUser $createUser,
        private UserRepository $repository,
        private RegistrationCombinedValidator $validator,
    ) {}

    public function __invoke(array $attributes): User
    {
        $attributes = $this->validator->validate($attributes);
        $user = ($this->createUser)($attributes);
        $user->setRoles((new Roles())->assignAsRoot());
        $this->repository->add($user);

        return $user;
    }
}
