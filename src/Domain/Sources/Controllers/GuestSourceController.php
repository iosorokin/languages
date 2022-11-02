<?php

declare(strict_types=1);

namespace Domain\Sources\Controllers;

use App\Responses\Json\OkResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Domain\Sources\Presenters\Guest\GuestIndexSources;
use Domain\Sources\Presenters\Guest\GuestShowSource;
use Domain\Sources\Transformers\GuestSourceTransformer;

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
