<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Presenters;

use Modules\Personal\Auth\Services\AuthService;
use Modules\Personal\User\Model\User;

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
