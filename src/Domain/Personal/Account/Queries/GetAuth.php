<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Queries;

use Domain\Personal\Account\Services\Auth\Auth;
use Domain\Personal\Account\Services\Auth\AuthService;

final class GetAuth
{
    public function __construct(
        private AuthService $authService,
    ) {}

    public function __invoke(): Auth
    {
        return $this->authService->getAuth();
    }
}
