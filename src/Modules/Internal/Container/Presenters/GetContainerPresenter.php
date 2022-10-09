<?php

namespace Modules\Internal\Container\Presenters;

use Modules\Internal\Container\Entites\Container;

interface GetContainerPresenter
{
    public function getOrThrowNotFound(int $id): Container;

    public function getOrThrowBadRequest(int $id): Container;
}
