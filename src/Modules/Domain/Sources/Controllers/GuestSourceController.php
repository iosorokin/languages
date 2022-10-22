<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Controllers;

use Core\Http\Responses\Json\OkResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Domain\Sources\Presenters\Guest\GuestIndexSourcesPresenter;
use Modules\Domain\Sources\Presenters\Guest\GuestShowSourcePresenter;

final class GuestSourceController
{
    public function show(Request $request, GuestShowSourcePresenter $presenter): JsonResponse
    {
        $source = $presenter((int) $request->route('source'));

        return new OkResponse($source->toArray());
    }

    public function index(Request $request, GuestIndexSourcesPresenter $presenter): JsonResponse
    {
        $sources = $presenter($request->all());

        return new OkResponse($sources);
    }
}
