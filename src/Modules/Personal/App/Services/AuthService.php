<?php

namespace Modules\Personal\App\Services;

use Modules\Personal\Domain\Contexts\User;

interface AuthService
{
    public function login(User $user): ?string;

    public function logout(User $user): void;

    public function getAuth(): ?User;
}
