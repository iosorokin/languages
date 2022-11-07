<?php

declare(strict_types=1);

namespace Domain\Core\Sources\Controllers;

use App\Responses\Json\IdResponse;
use App\Responses\Json\NoContentResponse;
use App\Responses\Json\OkResponse;
use Domain\Core\Sources\Presenters\User\UserCreateSource;
use Domain\Core\Sources\Presenters\User\UserDeleteSource;
use Domain\Core\Sources\Presenters\User\UserIndexSources;
use Domain\Core\Sources\Presenters\User\UserShowSource;
use Domain\Core\Sources\Presenters\User\UserUpdateSource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class UserSourceController
{
    public function store(Request $request, UserCreateSource $presenter): JsonResponse
    {
        $attributes = $request->all();
        $source = $presenter($attributes);

        return new IdResponse($source->getId());
    }

    public function show(Request $request, UserShowSource $presenter): JsonResponse
    {
        $source = $presenter((int) $request->route('source'));

        return new OkResponse();
    }

    public function index(Request $request, UserIndexSources $presenter): JsonResponse
    {
        $sources = $presenter($request->all());

        return new OkResponse((array) $sources);
    }

    public function update(Request $request, UserUpdateSource $presenter): JsonResponse
    {
        $presenter((int) $request->route('source'), $request->all());

        return new NoContentResponse();
    }

    public function delete(Request $request, UserDeleteSource $presenter): JsonResponse
    {
        $presenter((int) $request->route('source'));

        return new NoContentResponse();
    }
}
