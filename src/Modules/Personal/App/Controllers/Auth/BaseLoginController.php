<?php

namespace Modules\Personal\App\Controllers\Auth;

use Illuminate\Http\Request;
use Modules\Personal\App\Presenters\Auth\Base\BaseLogin;
use Symfony\Component\HttpFoundation\JsonResponse;

class BaseLoginController
{
    public function __construct(
        private BaseLogin $login,
    ) {}

    public function __invoke(Request $request)
    {
        $token = ($this->login)($request->all());

        return (new JsonResponse([
            'data' => compact('token')
        ]));
    }
}
