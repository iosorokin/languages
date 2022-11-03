<?php

declare(strict_types=1);

namespace Domain\Personal\Actions;

use Domain\Personal\Dto\NewUserDto;
use Domain\Personal\Entities\User;
use Domain\Personal\Entities\UserFactory;
use Domain\Personal\Repositories\PersonalRepository;

final class SeedUser
{
    public function __construct(
        private UserFactory $factory,
        private PersonalRepository $repository,
    ) {}

    public function __invoke(NewUserDto $dto): User
    {
        $user = $this->factory->register($dto);
        $this->repository->add($user);

        return $user;
    }
}
