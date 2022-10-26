<?php

namespace App\Controllers\Personal\Guest;

use Core\Http\Responses\Json\IdResponse;
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
