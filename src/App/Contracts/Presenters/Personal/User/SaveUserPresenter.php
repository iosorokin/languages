<?php

namespace App\Contracts\Presenters\Personal\User;

use App\Contracts\Structures\Personal\UserStructure;

interface SaveUserPresenter
{
    public function __invoke(UserStructure $user): void;
}
