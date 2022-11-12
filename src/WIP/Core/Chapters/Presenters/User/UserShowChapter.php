<?php

declare(strict_types=1);

namespace WIP\Core\Chapters\Presenters\User;

use WIP\Core\Chapters\Presenters\Internal\GetChapter;
use WIP\Core\Chapters\Validators\ShowChapterValidator;
use WIP\Internal\Container\Model\Container;

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
