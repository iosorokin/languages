<?php

namespace Domain\Personal\Repositories;

use Domain\Personal\Entities\User;

interface PersonalRepository
{
    public function add(User $personal): int;

    public function countUsers(): int;

    public function hasEmail(string $email);

    public function hasRoot(): bool;
}
