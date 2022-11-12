<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Services\Auth;

use Illuminate\Support\Str;
use WIP\Personal\Account\Model\Aggregates\Account;

final class FakeAuthService implements AuthService
{
    private ?Account $account;

    public function login(Account $account): ?string
    {
        $this->account = $account;

        return Str::random();
    }

    public function logout(Auth $account): void
    {
        $this->account = null;
    }

    public function getAuth(): ?Auth
    {

    }
}
