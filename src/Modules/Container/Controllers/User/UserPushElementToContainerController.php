<?php

namespace Modules\Container\Controllers\User;

use Core\Extensions\Request;
use Core\Http\Controller;
use Core\Http\Responses\Json\CreatedResponse;
use Illuminate\Http\JsonResponse;
use Modules\Container\Presenters\User\UserPushElement;
use Modules\Container\Presenters\User\UserPushElementPresenter;

class UserPushElementToContainerController extends Controller
{
    public function __construct(
        private UserPushElementPresenter $userPushElement,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $attributes = $request->all();
        ($this->userPushElement)($attributes);

        return new CreatedResponse();
    }
}
