<?php

namespace App\Repositories\Personal\User;

use App\Structures\Personal\UserStructure;

interface UserRepository
{
    public function add(UserStructure $user): void;
}
