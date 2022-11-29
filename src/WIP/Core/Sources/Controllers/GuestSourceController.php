<?php

declare(strict_types=1);

namespace WIP\Core\Sources\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Core\Infrastructure\Support\Responses\Json\OkResponse;
use WIP\Core\Sources\Presenters\Guest\GuestIndexSources;
use WIP\Core\Sources\Presenters\Guest\GuestShowSource;
use WIP\Core\Sources\Transformers\GuestSourceTransformer;

final class GuestSourceController
{
    public function __construct(
        private GuestSourceTransformer $transformer,
    ) {}

    public function show(Request $request, GuestShowSource $presenter): JsonResponse
    {
        $source = $presenter((int) $request->route('source'));
        $body = $this->transformer->detail($source);
        return new OkResponse($body);
    }

    public function index(Request $request, GuestIndexSources $presenter): JsonResponse
    {
        $sources = $presenter($request->all());

        return new OkResponse($sources);
    }
}
