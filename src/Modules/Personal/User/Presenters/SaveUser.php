<?php

declare(strict_types=1);

namespace Modules\Personal\User\Presenters;

use App\Contracts\Presenters\Personal\User\SaveUserPresenter;
use App\Contracts\Structures\Personal\UserStructure;
use Modules\Personal\User\Repositories\UserRepository;

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
