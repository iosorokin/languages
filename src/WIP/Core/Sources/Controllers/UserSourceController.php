<?php

declare(strict_types=1);

namespace WIP\Core\Sources\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Infrastructure\Support\Responses\Json\IdResponse;
use Infrastructure\Support\Responses\Json\NoContentResponse;
use Infrastructure\Support\Responses\Json\OkResponse;
use WIP\Core\Sources\Presenters\User\UserCreateSource;
use WIP\Core\Sources\Presenters\User\UserDeleteSource;
use WIP\Core\Sources\Presenters\User\UserIndexSources;
use WIP\Core\Sources\Presenters\User\UserShowSource;
use WIP\Core\Sources\Presenters\User\UserUpdateSource;

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
