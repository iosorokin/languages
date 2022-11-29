<?php

declare(strict_types=1);

namespace WIP\Core\Chapters\Controllers;

use App\Chapters\Controllers\ShowChapterResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Core\Infrastructure\Support\Responses\Json\CreatedResponse;
use WIP\Core\Chapters\Presenters\User\UserShowChapter;
use WIP\Core\Chapters\Presenters\User\UserStoreChapter;

final class UserChapterController
{
    public function store(Request $request, UserStoreChapter $presenter): JsonResponse
    {
        $chapter = $presenter($request->all());
        $location = route('api.chapters.show', [
            'chapter_id' => $chapter->getId(),
        ]);

        return new CreatedResponse($location);
    }

    public function show(Request $request, UserShowChapter $presenter): JsonResource
    {
        $chapter = $presenter((int) $request->route('chapter_id'), $request->all());

        return ShowChapterResource::make($chapter);
    }
}
