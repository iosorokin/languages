<?php

declare(strict_types=1);

namespace Modules\Personal\User\Presenters;

use Modules\Personal\User\Repositories\UserRepository;
use Modules\Personal\User\Structures\UserStructure;

final class SaveUser implements SaveUserPresenter
{
    public function __construct(
        private UserRepository $repository,
    ) {}

    public function __invoke(UserStructure $user): void
    {
        $this->repository->add($user);
    }
}
