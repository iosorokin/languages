<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Controllers;

use Core\Extensions\Request;
use Core\Http\Controller;
use Core\Http\Responses\Json\CreatedResponse;
use Modules\Core\Sources\Presenters\User\UserCreateSourcePresenter;

final class StoreSourceController extends Controller
{
    public function __construct(
        private UserCreateSourcePresenter $userCreateSource,
    ) {}

    public function __invoke(Request $request)
    {
        $attributes = $request->all();
        $source = ($this->userCreateSource)($attributes);

        return new CreatedResponse();
    }
}
