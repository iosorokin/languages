<?php

namespace Modules\Personal\Auth\Controllers\Api;

use Illuminate\Http\Request;
use Modules\Personal\Auth\Presenters\Login\LearnerBaseLogin;
use Symfony\Component\HttpFoundation\JsonResponse;

class LearnerBaseLoginController
{
    public function __construct(
        private LearnerBaseLogin $login,
    ) {}

    public function __invoke(Request $request)
    {
        $token = ($this->login)($request->all());

        return (new JsonResponse([
            'data' => compact('token')
        ]));
    }
}
