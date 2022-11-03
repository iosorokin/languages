<?php

namespace Domain\Personal\Repositories;

use Domain\Personal\Entities\User;

interface PersonalRepository
{
    public function add(User $user): int;

    public function countUsers(): int;

    public function hasEmail(string $email): bool;

    public function getByEmail(string $email): ?User;

    public function hasRoot(): bool;
}
