<?php

declare(strict_types=1);

namespace Domain\Personal\Policies;

use App\Exceptions\DomainException;
use Domain\Personal\Repositories\PersonalRepository;

final class UserAccessPolicy
{
    public function __construct(
        private PersonalRepository $repository,
    ) {}

    public function canAssignAsRoot()
    {
        if ($this->repository->hasRoot()) {
            // todo вынести в конфиг
            throw new DomainException('personal.can_not_assign_as_root');
        }
    }
}
