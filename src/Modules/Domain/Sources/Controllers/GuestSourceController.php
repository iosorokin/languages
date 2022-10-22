<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Controllers;

use Core\Http\Responses\Json\OkResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Domain\Sources\Presenters\Guest\GuestIndexSourcesPresenter;
use Modules\Domain\Sources\Presenters\Guest\GuestShowSourcePresenter;
use Modules\Domain\Sources\Transformers\GuestSourceTransformer;

final class GuestSourceController
{
    public function __construct(
        private GuestSourceTransformer $transformer,
    ) {}

    public function show(Request $request, GuestShowSourcePresenter $presenter): JsonResponse
    {
        $source = $presenter((int) $request->route('source'));
        $body = $this->transformer->detail($source);
        return new OkResponse($body);
    }

    public function index(Request $request, GuestIndexSourcesPresenter $presenter): JsonResponse
    {
        $sources = $presenter($request->all());

        return new OkResponse($sources);
    }
}
