<?php

namespace Modules\Personal\App\Controllers\Personal;

use Core\Http\Responses\Json\IdResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Personal\App\Presenters\Personal\Guest\Register;

final class RegisterController
{
    public function __construct(
        private Register $register,
    ) {}

    public function store(Request $request): JsonResponse
    {
        $user = ($this->register)($request->all());

        return new IdResponse($user->getId()->value());
    }
}
