<?php

namespace App\Controllers\Auth;

use App\Responses\Json\NoContentResponse;
use Domain\Personal\Actions\Auth\Logout;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Infrastructure\Services\Auth\AuthService;

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
