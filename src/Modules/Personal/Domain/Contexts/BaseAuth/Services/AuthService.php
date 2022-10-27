<?php

namespace Modules\Personal\Domain\Contexts\BaseAuth\Services;

use Modules\Personal\Domain\Entity\User;

interface AuthService
{
    public function login(User $user): ?string;

    public function logout(User $user): void;

    public function getAuth(): ?User;
}
