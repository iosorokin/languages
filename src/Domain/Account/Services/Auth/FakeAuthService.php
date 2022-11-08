<?php

declare(strict_types=1);

namespace Domain\Account\Services\Auth;

use Domain\Account\Model\Aggregates\Account;
use Domain\Account\Model\Entities\Accesses\Accesses;
use Domain\Account\Model\Values\Access\DisableAccess;
use Domain\Account\Model\Values\Access\EnableAccess;
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
