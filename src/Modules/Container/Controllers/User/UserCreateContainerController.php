<?php

namespace Modules\Container\Controllers\User;

use Core\Extensions\Request;
use Core\Http\Controller;
use Core\Http\Responses\Json\CreatedResponse;
use Illuminate\Http\JsonResponse;
use Modules\Container\Presenters\User\UserPushElement;

class UserCreateContainerController extends Controller
{
    public function __construct(
        private UserPushElement $createContainer,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $attributes = $request->all();
        ($this->createContainer)($attributes);

        return new CreatedResponse();
    }
}
