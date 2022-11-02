<?php

declare(strict_types=1);

namespace Domain\Personal\Actions\Console;

use App\Validators\RegistrationCombinedValidator;
use Domain\Personal\Domain\UserRepository;
use Domain\Personal\Entities\User;
use Domain\Personal\Values\Accesses\UnconfirmUser;

final class InitRootUser
{
    public function __construct(
        private RegistrationCombinedValidator $validator,
        private UserRepository                $repository,
    ) {}

    public function __invoke(array $attributes): User
    {
        $attributes = $this->validator->validate($attributes);
        $user = User::make($attributes);
        $user->setAccesses((new UnconfirmUser())->assignAsRoot());
        $this->repository->add($user);

        return $user;
    }
}
