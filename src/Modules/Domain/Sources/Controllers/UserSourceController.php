<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Controllers;

use Core\Http\Responses\Json\IdResponse;
use Core\Http\Responses\Json\NoContentResponse;
use Core\Http\Responses\Json\OkResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Domain\Sources\Presenters\User\UserCreateSource;
use Modules\Domain\Sources\Presenters\User\UserDeleteSource;
use Modules\Domain\Sources\Presenters\User\UserIndexSources;
use Modules\Domain\Sources\Presenters\User\UserShowSource;
use Modules\Domain\Sources\Presenters\User\UserUpdateSource;
use Modules\Domain\Sources\Transformers\SourceTransformer;

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