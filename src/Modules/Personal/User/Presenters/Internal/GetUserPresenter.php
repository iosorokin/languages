<?php

namespace Modules\Personal\User\Presenters\Internal;

use Modules\Personal\User\Entities\User;

interface GetUserPresenter
{
    public function __invoke(int $id): User;
}
