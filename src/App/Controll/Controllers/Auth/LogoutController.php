<?php

namespace App\Controll\Controllers\Auth;

use Domain\Personal\Account\Actions\Auth\Logout;
use Domain\Personal\Account\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Infrastructure\Support\Responses\Json\NoContentResponse;

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
