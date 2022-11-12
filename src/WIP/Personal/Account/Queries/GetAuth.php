<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Queries;

use WIP\Personal\Account\Services\Auth\Auth;
use WIP\Personal\Account\Services\Auth\AuthService;

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
