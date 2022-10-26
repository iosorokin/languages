<?php

declare(strict_types=1);

namespace App\Controllers\Personal\Admin;

use App\Database\Personal\UserRepository;
use Modules\Personal\Actions\CreateUser;
use Modules\Personal\Entity\User;
use Modules\Personal\Validators\RegistrationCombinedValidator;
use Modules\Personal\Validators\Single\RolesValidator;

final class AdminCreateUser
{
    public function __construct(
        private CreateUser $createUser,
        private UserRepository                       $repository,
        private RegistrationCombinedValidator        $validator,
    ) {}

    public function __invoke(array $attributes): User
    {
        $this->validator->add(RolesValidator::class);
        $attributes = $this->validator->validate($attributes);
        $user = ($this->createUser)($attributes);
        $this->repository->add($user);

        return $user;
    }
}
