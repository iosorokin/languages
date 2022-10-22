<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Controllers;

use Core\Http\Controller;
use Core\Http\Responses\Json\CreatedResponse;
use Core\Http\Responses\Json\IdResponse;
use Core\Http\Responses\Json\NoContentResponse;
use Core\Http\Responses\Json\OkResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Domain\Sources\Presenters\User\UserCreateSourcePresenter;
use Modules\Domain\Sources\Presenters\User\UserDeleteSourcePresenter;
use Modules\Domain\Sources\Presenters\User\UserIndexSourcesPresenter;
use Modules\Domain\Sources\Presenters\User\UserShowSourcePresenter;
use Modules\Domain\Sources\Presenters\User\UserUpdateSourcePresenter;
use Modules\Domain\Sources\Resources\ShowSourceResource;

final class UserSourceController extends Controller
{
    public function store(Request $request, UserCreateSourcePresenter $presenter): JsonResponse
    {
        $attributes = $request->all();
        $source = $presenter($attributes);

        return new IdResponse($source->getId());
    }

    public function show(Request $request, UserShowSourcePresenter $presenter): JsonResponse
    {
        $source = $presenter((int) $request->route('source'));

        return ShowSourceResource::make($source);
    }

    public function index(Request $request, UserIndexSourcesPresenter $presenter): JsonResponse
    {
        $sources = $presenter($request->all());

        return new OkResponse((array) $sources);
    }

    public function update(Request $request, UserUpdateSourcePresenter $presenter): JsonResponse
    {
        $presenter((int) $request->route('source'), $request->all());

        return new NoContentResponse();
    }

    public function delete(Request $request, UserDeleteSourcePresenter $presenter): JsonResponse
    {
        $presenter((int) $request->route('source'));

        return new NoContentResponse();
    }
}
