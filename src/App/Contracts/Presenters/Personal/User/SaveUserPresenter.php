<?php

namespace App\Contracts\Presenters\Personal\User;

use App\Contracts\Structures\UserStructure;

interface SaveUserPresenter
{
    public function __invoke(UserStructure $user): void;
}
