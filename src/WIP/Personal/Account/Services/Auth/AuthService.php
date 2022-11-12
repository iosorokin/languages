<?php

namespace WIP\Personal\Account\Services\Auth;

use WIP\Personal\Account\Model\Aggregates\Account;

interface AuthService
{
    public function login(Account $account): ?string;

    public function logout(Auth $account): void;

    public function getAuth(): ?Auth;
}
