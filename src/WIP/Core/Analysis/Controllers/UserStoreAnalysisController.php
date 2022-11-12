<?php

declare(strict_types=1);

namespace WIP\Core\Analysis\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Infrastructure\Support\Responses\Json\CreatedResponse;
use WIP\Core\Analysis\Presenters\User\UserCreateAnalysis;

final class UserStoreAnalysisController
{
    public function __construct(
        private UserCreateAnalysis $userCreateAnalysis,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $parsing = ($this->userCreateAnalysis)($request->all());

        return new CreatedResponse();
    }
}
