<?php

namespace Modules\Personal\User\Presenters\Internal;

use Modules\Personal\User\Structures\User;

interface GetUserPresenter
{
    public function __invoke(int $id): ?User;

    public function getOrThrowException(int $id): User;
}
