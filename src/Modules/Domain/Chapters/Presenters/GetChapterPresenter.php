<?php

namespace Modules\Domain\Chapters\Presenters;

use Modules\Internal\Container\Entites\Container;

interface GetChapterPresenter
{
    public function getOrThrowNotFound(int $id): Container;

    public function getOrThrowBadRequest(int $id): Container;
}
