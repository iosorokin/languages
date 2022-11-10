<?php

namespace App\Controll\Controllers\Auth;

use App\Support\Responses\Json\NoContentResponse;
use Domain\Personal\Account\Actions\Auth\Logout;
use Domain\Personal\Account\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
