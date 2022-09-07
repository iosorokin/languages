<?php

namespace Modules\Personal\User\Factories;

use App\Structures\Personal\UserStructure;
use Modules\Personal\User\Contexts\User;
use Modules\Personal\User\Dto\CreateUserDto;

class UserFactory
{
    public function new(CreateUserDto $dto): User
    {
        $user = new User($this->createStructure());
        $user->setName($dto->getName());

        return $user;
    }

    private function createStructure(): UserStructure
    {
        return app()->make(UserStructure::class);
    }
}
