<?php

namespace App\Controll\Controllers\Personal;

use Domain\Personal\Account\Actions\Guest\Register;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Infrastructure\Support\Responses\Json\IdResponse;

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
