<?php

declare(strict_types=1);

namespace Modules\Core\Chapters\Presenters\User;

use Modules\Core\Chapters\Presenters\Mixins\CreateChapter;
use Modules\Internal\Container\Model\Container;

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