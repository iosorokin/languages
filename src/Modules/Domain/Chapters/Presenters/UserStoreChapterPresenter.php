<?php

namespace Modules\Domain\Chapters\Presenters;

use Modules\Internal\Container\Structures\Container;

interface UserStoreChapterPresenter
{
    public function __invoke(array $array): Container;
}
