<?php

declare(strict_types=1);

namespace Modules\Domain\Chapters\Controllers;

use Core\Extensions\Request;
use Core\Http\Responses\Json\CreatedResponse;
use Illuminate\Http\JsonResponse;
use Modules\Domain\Chapters\Presenters\UserStoreChapterPresenter;

final class UserStoreChapterController
{
    public function __construct(
        private UserStoreChapterPresenter $userStoreChapter,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $chapter = ($this->userStoreChapter)($request->all());

        return new CreatedResponse();
    }
}
