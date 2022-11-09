<?php

namespace App\Controll\Controllers\Auth;

use Domain\Personal\Account\Actions\Auth\BaseLogin;
use Illuminate\Http\Request;
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
