<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Actions\Auth;

use Domain\Personal\Account\Model\Aggregates\Account;
use Domain\Personal\Account\Services\Auth\AuthService;

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
