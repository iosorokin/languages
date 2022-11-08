<?php

namespace Domain\Account\Services\Auth;

use Domain\Account\Model\Aggregates\Account;

interface AuthService
{
    public function login(Account $account): ?string;

    public function logout(Auth $account): void;

    public function getAuth(): ?Auth;
}
