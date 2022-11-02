<?php

declare(strict_types=1);

namespace Domain\Analysis\Controllers;

use App\Responses\Json\CreatedResponse;
use Illuminate\Http\JsonResponse;
use Domain\Analysis\Presenters\User\UserCreateAnalysis;
use Illuminate\Http\Request;

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
