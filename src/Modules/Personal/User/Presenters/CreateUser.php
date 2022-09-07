<?php

namespace Modules\Personal\User\Presenters;

use App\Contracts\Presenters\Personal\User\CreateUserPresenter;
use App\Contracts\Structures\Personal\UserStructure;
use Modules\Personal\User\Dto\CreateUserDto;
use Modules\Personal\User\Factories\UserFactory;
use Modules\Personal\User\Repositories\UserRepository;

class CreateUser implements CreateUserPresenter
{
    public function __construct(
        private UserFactory $factory,
        private UserRepository $userRepository,
    ) {}

    public function __invoke(array $attributes): UserStructure
    {
        $dto = CreateUserDto::new($attributes);
        $user = $this->factory->new($dto);
        $this->userRepository->add($user->structure);

        return $user->structure;
    }
}
