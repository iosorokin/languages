<?php

namespace App\Presenters\Personal\User;

use App\Repositories\Personal\User\UserRepository;
use App\Structures\Personal\UserStructure;
use Modules\Personal\User\Actions\CreateUser;
use Modules\Personal\User\Dto\CreateUserDto;

class NewUser
{
    public function __construct(
        private CreateUser $createUser,
        private UserRepository $userRepository,
    ) {}

    public function __invoke(array $attributes): UserStructure
    {
        $dto = CreateUserDto::new($attributes);
        $user = ($this->createUser)($dto);
        $this->userRepository->add($user->structure);

        return $user->structure;
    }
}
