<?php

declare(strict_types=1);

namespace Domain\Personal\Actions\Auth;

use Domain\Personal\Entities\User;
use Infrastructure\Services\Auth\AuthService;

final class Logout
{
    public function __construct(
        private AuthService $authService,
    ) {}

    public function __invoke(?User $user = null): void
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
