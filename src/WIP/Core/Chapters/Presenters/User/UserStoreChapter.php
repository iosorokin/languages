<?php

declare(strict_types=1);

namespace WIP\Core\Chapters\Presenters\User;

use WIP\Core\Chapters\Presenters\Mixins\CreateChapter;
use WIP\Internal\Container\Model\Container;

final class UserStoreChapter
{
    public function __construct(
        private CreateChapter $createChapter,
    ) {}

    public function __invoke(array $attributes): Container
    {
        $chapter = ($this->createChapter)($attributes);

        return $chapter;
    }
}
