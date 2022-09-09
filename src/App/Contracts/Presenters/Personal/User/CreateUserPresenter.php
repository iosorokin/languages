<?php

namespace App\Contracts\Presenters\Personal\User;

use App\Contracts\Structures\Personal\UserStructure;

interface CreateUserPresenter
{
    public function __invoke(array $attributes): UserStructure;
}
