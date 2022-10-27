<?php

declare(strict_types=1);

namespace Modules\Core\Chapters\Presenters\User;

use Modules\Core\Chapters\Presenters\Internal\GetChapter;
use Modules\Core\Chapters\Validators\ShowChapterValidator;
use Modules\Internal\Container\Model\Container;

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
