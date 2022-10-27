<?php

declare(strict_types=1);

namespace Modules\Personal\App\Presenters\Personal\Admin;

use Modules\Personal\App\Validators\RegistrationCombinedValidator;
use Modules\Personal\App\Validators\Single\RolesValidator;
use Modules\Personal\Domain\Contexts\User;
use Modules\Personal\Domain\UserRepository;

final class AdminCreateUser
{
    public function __construct(
        private RegistrationCombinedValidator $validator,
        private UserRepository                $repository,
    ) {}

    public function __invoke(array $attributes): User
    {
        $this->validator->add(RolesValidator::class);
        $attributes = $this->validator->validate($attributes);
        $user = User::register($attributes);
        $this->repository->add($user);

        return $user;
    }
}
