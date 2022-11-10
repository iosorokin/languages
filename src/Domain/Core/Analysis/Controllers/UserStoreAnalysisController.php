<?php

declare(strict_types=1);

namespace Domain\Core\Analysis\Controllers;

use App\Support\Responses\Json\CreatedResponse;
use Domain\Core\Analysis\Presenters\User\UserCreateAnalysis;
use Illuminate\Http\JsonResponse;
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
