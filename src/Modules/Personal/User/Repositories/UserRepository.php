<?php

namespace Modules\Personal\User\Repositories;

use Modules\Personal\User\Structures\User;

interface UserRepository
{
    public function save(User $user): void;

    public function get(int $id): ?User;
}
