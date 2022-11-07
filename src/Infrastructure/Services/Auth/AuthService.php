<?php

namespace Infrastructure\Services\Auth;

use Domain\Account\Model\Aggregates\Account;

interface AuthService
{
    public function login(Account $account): ?string;

    public function logout(AuthUser $account): void;

    public function getAuth(): ?AuthUser;
}
