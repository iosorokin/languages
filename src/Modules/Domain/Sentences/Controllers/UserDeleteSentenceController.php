<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Controllers;

use Core\Extensions\Request;
use Core\Http\Responses\Json\NoContentResponse;
use Illuminate\Http\JsonResponse;
use Modules\Domain\Sentences\Presenters\User\UserDeleteSentencePresenter;

final class UserDeleteSentenceController
{
    public function __construct(
        private UserDeleteSentencePresenter $userDeleteSentence,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        ($this->userDeleteSentence)($request->all());

        return new NoContentResponse();
    }
}
