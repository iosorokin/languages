<?php

declare(strict_types=1);

namespace Modules\Personal\App\Presenters\Auth\User;

use Modules\Personal\Domain\Contexts\BaseAuth\Services\AuthService;
use Modules\Personal\Domain\Entity\User;

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
