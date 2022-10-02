<?php

namespace Modules\Personal\User\Controllers\Guest;

use Core\Http\Controller;
use Core\Http\Responses\Json\CreatedResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Personal\User\Presenters\Guest\Register;

final class RegistrationController extends Controller
{
    public function __construct(
        private Register $register,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $user = ($this->register)($request->all());
        $location = route('api.users.show', ['id' => $user->getId()]);

        return new CreatedResponse($location);
    }
}
