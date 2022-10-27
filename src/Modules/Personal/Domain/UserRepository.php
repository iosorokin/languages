<?php

namespace Modules\Personal\Domain;

use Modules\Personal\Domain\Contexts\User;

interface UserRepository
{
    public function add(User $user): void;

    public function getByEmail(string $email): ?User;
}
