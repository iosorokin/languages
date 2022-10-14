<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Controllers;

use Core\Http\Controller;
use Core\Http\Responses\Json\CreatedResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Domain\Sources\Presenters\User\UserCreateSourcePresenter;
use Modules\Domain\Sources\Presenters\User\UserShowSourcePresenter;
use Modules\Domain\Sources\Resources\ShowSourceResource;

final class UserSourceController extends Controller
{
    public function store(Request $request, int $languageId, UserCreateSourcePresenter $presenter): JsonResponse
    {
        $attributes = $request->all();
        $source = $presenter($languageId, $attributes);
        $location = route('api.user.sources.store', ['source_id' => $source->getId()]);

        return new CreatedResponse($location);
    }

    public function show(Request $request, UserShowSourcePresenter $presenter)
    {
        $source = $presenter($request);

        return ShowSourceResource::make($source);
    }
}
