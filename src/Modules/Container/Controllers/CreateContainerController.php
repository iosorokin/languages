<?php

namespace Modules\Container\Controllers;

use Core\Extensions\Request;
use Core\Http\Controller;
use Core\Http\Responses\Json\CreatedResponse;
use Illuminate\Support\Arr;
use Modules\Container\Enums\LanguageTypes;
use Modules\Container\Presenters\CreateContainer;

class CreateContainerController extends Controller
{
    public function __construct(
        private CreateContainer $createContainer,
    ) {}

    public function __invoke(Request $request)
    {
        $attributes = $request->all();
        ($this->createContainer)($attributes);

        return new CreatedResponse();
    }
}
