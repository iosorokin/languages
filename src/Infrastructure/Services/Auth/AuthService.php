<?php

namespace Infrastructure\Services\Auth;

use Domain\Personal\Entities\User;

interface AuthService
{
    public function login(User $user): ?string;

    public function logout(User $user): void;

    public function getAuth(): ?User;
}
