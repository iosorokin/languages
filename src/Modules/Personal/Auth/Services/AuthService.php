<?php

namespace Modules\Personal\Auth\Services;

use Modules\Personal\User\Structures\User;

interface AuthService
{
    public function login(User $user): ?string;

    public function logout(User $user): void;

    public function getAuth(): ?User;
}
