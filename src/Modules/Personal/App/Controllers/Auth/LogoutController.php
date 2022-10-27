<?php

namespace Modules\Personal\App\Controllers\Auth;

use Core\Http\Responses\Json\NoContentResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Personal\App\Presenters\Auth\User\Logout;
use Modules\Personal\Domain\Contexts\BaseAuth\Services\AuthService;

class LogoutController
{
    public function __construct(
        private AuthService $authService,
        private Logout $logout,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $auth = $this->authService->getAuth();
        ($this->logout)($auth);

        return new NoContentResponse();
    }
}
