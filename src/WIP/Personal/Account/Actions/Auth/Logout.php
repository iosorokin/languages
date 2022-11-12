<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Actions\Auth;

use WIP\Personal\Account\Model\Aggregates\Account;
use WIP\Personal\Account\Services\Auth\AuthService;

final class Logout
{
    public function __construct(
        private AuthService $authService,
    ) {}

    public function __invoke(?Account $user = null): void
    {
        if (! $user) {
            $user = $this->authService->getAuth();
        }

        if (! $user) {
            //
        }

        $this->authService->logout($user);
    }
}
