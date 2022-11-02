<?php

declare(strict_types=1);

namespace Domain\Chapters\Controllers;

use App\Responses\Json\CreatedResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Domain\Chapters\Presenters\User\UserShowChapter;
use Domain\Chapters\Presenters\User\UserStoreChapter;

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
