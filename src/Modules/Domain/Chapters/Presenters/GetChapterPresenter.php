<?php

namespace Modules\Domain\Chapters\Presenters;

use Modules\Internal\Container\Structures\Container;

interface GetChapterPresenter
{
    public function get(int $id): ?Container;

    public function getOrThrowNotFound(int $id): Container;

    public function getOrThrowBadRequest(int $id): Container;
}
