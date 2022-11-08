<?php

declare(strict_types=1);

namespace Domain\Account\Queries;

use Domain\Account\Services\Auth\Auth;
use Domain\Account\Services\Auth\AuthService;

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
