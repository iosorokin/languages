<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Controllers;

use Core\Extensions\Request;
use Core\Http\Controller;
use Core\Http\Responses\Json\CreatedResponse;
use Illuminate\Http\JsonResponse;
use Modules\Education\Dictionary\Presenters\User\UserCreateDictionaryPresenter;

final class StoreDictionaryController extends Controller
{
    public function __construct(
        private UserCreateDictionaryPresenter $createDictionary,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $attributes = $request->all();
        ($this->createDictionary)($attributes);

        return new CreatedResponse();
    }
}
