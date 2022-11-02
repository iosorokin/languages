<?php

declare(strict_types=1);

namespace Domain\Personal\Actions\Common;

use Domain\Personal\Entities\User;
use Infrastructure\Services\Auth\AuthService;

final class Logout
{
    public function __construct(
        private AuthService $authService,
    ) {}

    public function __invoke(User $user)
    {
        $this->authService->logout($user);
    }
}
