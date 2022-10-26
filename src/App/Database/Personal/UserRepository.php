<?php

namespace App\Database\Personal;

use Modules\Personal\Entity\User;

interface UserRepository
{
    public function add(User $user): void;

    public function getByEmail(string $email): ?User;
}
