<?php

namespace Modules\Personal\User\Repositories;

use Modules\Personal\User\Structures\UserStructure;

interface UserRepository
{
    public function add(UserStructure $user): void;
}
