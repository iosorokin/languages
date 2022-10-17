<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Controllers;

use Core\Http\Controller;
use Core\Http\Responses\Json\CreatedResponse;
use Core\Http\Responses\Json\IdResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Domain\Sources\Presenters\User\UserCreateSourcePresenter;
use Modules\Domain\Sources\Presenters\User\UserShowSourcePresenter;
use Modules\Domain\Sources\Resources\ShowSourceResource;

final class UserSourceController extends Controller
{
    public function store(Request $request, UserCreateSourcePresenter $presenter): JsonResponse
    {
        $attributes = $request->all();
        $source = $presenter($attributes);

        return new IdResponse($source->getId());
    }

    public function show(Request $request, UserShowSourcePresenter $presenter)
    {
        $source = $presenter((int) $request->route('source_id'));

        return ShowSourceResource::make($source);
    }
}
