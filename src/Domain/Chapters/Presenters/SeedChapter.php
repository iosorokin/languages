<?php

declare(strict_types=1);

namespace Domain\Chapters\Presenters;

use Domain\Chapters\Presenters\Mixins\CreateChapter;
use Domain\Internal\Container\Model\Container;

final class SeedChapter
{
    public function __construct(
        private CreateChapter          $createChapter,
    ) {}

    public function __invoke(array $attributes): Container
    {
        $chapter = ($this->createChapter)($attributes);

        return $chapter;
    }
}
