<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Presenters\Internal;

use Modules\Personal\Auth\Services\AuthService;
use Modules\Personal\User\Model\User;

final class GetAuthUser
{
    public function __construct(
        private AuthService $authService,
    ) {}

    public function __invoke(): ?User
    {
        return $this->authService->getAuth();
    }
}
