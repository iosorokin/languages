<?php

declare(strict_types=1);

namespace Domain\Personal\Actions\Console;

use Domain\Personal\Dto\NewUserDto;
use Domain\Personal\Entities\User;
use Domain\Personal\Entities\UserFactory;
use Domain\Personal\Policies\CanAssignAsRoot;
use Domain\Personal\Repositories\PersonalRepository;
use Domain\Personal\Values\Accesses\Access;
use Domain\Personal\Values\Accesses\AccessesImp;

final class InitRootUser
{
    public function __construct(
        private CanAssignAsRoot    $canAssignAsRoot,
        private UserFactory        $factory,
        private PersonalRepository $repository,
    ) {}

    public function __invoke(NewUserDto $dto): User
    {
        ($this->canAssignAsRoot)();
        $user = $this->factory->register($dto);
        $accessesWithRoot = AccessesImp::new($user->accesses())
            ->addAccess(Access::Root);
        $user->setAccesses($accessesWithRoot);
        $this->repository->add($user);

        return $user;
    }
}
