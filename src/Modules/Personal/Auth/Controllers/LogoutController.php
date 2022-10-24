<?php

namespace Modules\Personal\Auth\Controllers;

use Core\Http\Responses\Json\NoContentResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Personal\Auth\Presenters\Internal\GetAuthUser;
use Modules\Personal\Auth\Presenters\Logout;

class LogoutController
{
    public function __construct(
        private GetAuthUser $getAuthUser,
        private Logout $logout,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $auth = ($this->getAuthUser)();
        ($this->logout)($auth);

        return new NoContentResponse();
    }
}
