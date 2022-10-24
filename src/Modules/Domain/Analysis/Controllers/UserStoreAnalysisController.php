<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Controllers;

use Core\Extensions\Request;
use Core\Http\Responses\Json\CreatedResponse;
use Illuminate\Http\JsonResponse;
use Modules\Domain\Analysis\Presenters\User\UserCreateAnalysis;

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
