<?php

namespace Modules\Personal\User\Repositories;

use App\Contracts\Structures\UserStructure;

interface UserRepository
{
    public function add(UserStructure $user): void;
}
