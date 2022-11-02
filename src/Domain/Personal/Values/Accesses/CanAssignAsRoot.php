<?php

declare(strict_types=1);

namespace Domain\Personal\Values\Accesses;

use App\Exceptions\DomainException;
use Domain\Personal\PersonalRepository;

final class CanAssignAsRoot
{
    public function __construct(
        private PersonalRepository $repository,
    ) {}

    public function __invoke()
    {
        $countUsers = $this->repository->countUsers();
        if ($countUsers > 0) {
            // todo вынести в конфиг
            throw new DomainException('personal.can_not_assign_as_root');
        }
    }
}
