<?php

namespace Modules\Personal\User\Actions;

use Modules\Personal\User\Contexts\User;
use Modules\Personal\User\Dto\CreateUserDto;
use Modules\Personal\User\Factories\UserFactory;

class CreateUser
{
    public function __construct(
        private UserFactory $factory,
    ) {}

    public function __invoke(CreateUserDto $dto): User
    {
        $user = $this->factory->new($dto);

        return $user;
    }
}
