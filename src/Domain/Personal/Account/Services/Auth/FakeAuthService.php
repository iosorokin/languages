<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Services\Auth;

use Domain\Personal\Account\Model\Aggregates\Account;
use Illuminate\Support\Str;

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
