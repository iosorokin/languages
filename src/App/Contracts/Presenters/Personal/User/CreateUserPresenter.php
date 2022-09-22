<?php

namespace App\Contracts\Presenters\Personal\User;

use App\Contracts\Structures\UserStructure;

interface CreateUserPresenter
{
    public function __invoke(array $attributes): UserStructure;
}
