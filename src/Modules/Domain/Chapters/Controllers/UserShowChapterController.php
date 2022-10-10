<?php

declare(strict_types=1);

namespace Modules\Domain\Chapters\Controllers;

use Core\Extensions\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Domain\Chapters\Presenters\ShowChapterPresenter;
use Modules\Domain\Chapters\Resources\ShowChapterResource;

final class UserShowChapterController
{
    public function __construct(
        private ShowChapterPresenter $showChapter,
    )
    {
    }

    public function __invoke(Request $request): JsonResource
    {
        $chapter = ($this->showChapter)($request->all());

        return ShowChapterResource::make($chapter);
    }
}
