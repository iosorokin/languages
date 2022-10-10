<?php

declare(strict_types=1);

namespace Modules\Domain\Chapters\Presenters;

use Modules\Domain\Chapters\Validators\ShowChapterValidator;
use Modules\Internal\Container\Entites\Container;

final class ShowChapter implements ShowChapterPresenter
{
    public function __construct(
        private ShowChapterValidator $validator,
        private GetChapterPresenter $getChapter,
    ) {}

    public function __invoke(array $attributes): Container
    {
        $attributes = $this->validator->validate($attributes);
        $chapter = $this->getChapter->getOrThrowBadRequest((int) $attributes['chapter_id']);

        return $chapter;
    }
}
