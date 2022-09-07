<?php

namespace Modules\Personal\User\Repositories;

use App\Contracts\Structures\Personal\UserStructure;

interface UserRepository
{
    public function add(UserStructure $user): void;
}
