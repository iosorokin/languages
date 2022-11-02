<?php

declare(strict_types=1);

namespace Domain\Personal\Actions\Admin;

use App\Validators\RegistrationCombinedValidator;
use App\Validators\Single\RolesValidator;
use Domain\Personal\Entities\User;
use Domain\Personal\PersonalRepository;

final class AdminCreateUser
{
    public function __construct(
        private RegistrationCombinedValidator $validator,
        private PersonalRepository            $repository,
    )
    {
    }

    public function __invoke(array $attributes): User
    {
        $this->validator->add(RolesValidator::class);
        $attributes = $this->validator->validate($attributes);
        $user = User::make($attributes);
        $this->repository->add($user);

        return $user;
    }
}
