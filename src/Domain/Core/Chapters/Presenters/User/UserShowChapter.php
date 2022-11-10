<?php

declare(strict_types=1);

namespace Domain\Core\Chapters\Presenters\User;

use Domain\Core\Chapters\Presenters\Internal\GetChapter;
use Domain\Core\Chapters\Validators\ShowChapterValidator;
use Domain\Internal\Container\Model\Container;

final class UserShowChapter
{
    public function __construct(
        private ShowChapterValidator $validator,
        private GetChapter $getChapter,
    ) {}

    public function __invoke(int $chapterId, array $attributes): Container
    {
        $attributes = $this->validator->validate($attributes);
        $chapter = $this->getChapter->getOrThrowBadRequest((int) $attributes['chapter_id']);

        return $chapter;
    }
}