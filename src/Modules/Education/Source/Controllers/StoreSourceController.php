<?php

declare(strict_types=1);

namespace Modules\Education\Source\Controllers;

use Core\Extensions\Request;
use Core\Http\Controller;
use Core\Http\Responses\Json\CreatedResponse;
use Illuminate\Support\Arr;
use Modules\Container\Enums\LanguageTypes;
use Modules\Education\Source\Presenters\User\UserCreateSourcePresenter;

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
