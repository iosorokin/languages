<?php

namespace Modules\Personal\User\Presenters;

use Modules\Personal\User\Structures\UserStructure;

interface CreateUserPresenter
{
    public function __invoke(array $attributes): UserStructure;
}
