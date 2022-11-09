<?php

namespace App\Controll\Controllers\Personal;

use App\Responses\Json\IdResponse;
use Domain\Personal\Account\Actions\Guest\Register;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
