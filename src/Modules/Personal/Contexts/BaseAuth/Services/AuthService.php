<?php

namespace Modules\Personal\Contexts\BaseAuth\Services;

use Modules\Personal\Entity\User;

interface AuthService
{
    public function login(User $user): ?string;

    public function logout(User $user): void;

    public function getAuth(): ?User;
}
