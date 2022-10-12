<?php

namespace Modules\Personal\User\Controllers\Guest;

use Core\Http\Controller;
use Core\Services\Responses\Json\CreatedResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Personal\User\Presenters\Publics\RegisterPresenter;

final class RegistrationController extends Controller
{
    public function __construct(
        private RegisterPresenter $register,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $user = ($this->register)($request->all());
        $location = route('api.users.show', ['user_id' => $user->getId()]);

        return new CreatedResponse($location);
    }
}
