<?php

namespace Domain\Presentation\Web\Api\V1\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Core\Infrastructure\Support\Responses\Json\NoContentResponse;
use WIP\Personal\Account\Actions\Auth\Logout;
use WIP\Personal\Account\Services\Auth\AuthService;

class LogoutController
{
    public function __construct(
        private AuthService $authService,
        private Logout      $logout,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $auth = $this->authService->getAuth();
        ($this->logout)($auth);

        return new NoContentResponse();
    }
}
