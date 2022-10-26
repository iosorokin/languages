<?php

declare(strict_types=1);

namespace App\Controllers\Auth\User;

use App\Database\Personal\EloquentUserModel;
use Modules\Personal\Contexts\BaseAuth\Services\AuthService;
use Modules\Personal\Entity\User;

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
