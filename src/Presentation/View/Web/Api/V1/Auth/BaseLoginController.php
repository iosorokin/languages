<?php

namespace Domain\Presentation\Web\Api\V1\Auth;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use WIP\Personal\Account\Actions\Auth\BaseLogin;

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
