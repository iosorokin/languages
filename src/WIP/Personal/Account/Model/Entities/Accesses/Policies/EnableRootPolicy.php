<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Model\Entities\Accesses\Policies;

use App\Exceptions\DomainException;
use WIP\Personal\Account\Repositories\AccountRepository;

final class EnableRootPolicy implements EnableAccessPolicy
{
    public function __construct(
        private AccountRepository $repository,
    ) {}

    public function __invoke(): void
    {
        if ($this->repository->hasRoot()) {
            // todo вынести в конфиг
            throw new DomainException('personal.can_not_assign_as_root');
        }
    }
}
