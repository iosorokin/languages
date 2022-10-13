<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Controllers;

use Core\Extensions\Request;
use Core\Services\Responses\Json\CreatedResponse;
use Illuminate\Http\JsonResponse;
use Modules\Domain\Analysis\Presenters\User\UserCreateAnalysisPresenter;

final class UserStoreAnalysisController
{
    public function __construct(
        private UserCreateAnalysisPresenter $userCreateParsing,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $parsing = ($this->userCreateParsing)($request->all());

        return new CreatedResponse();
    }
}