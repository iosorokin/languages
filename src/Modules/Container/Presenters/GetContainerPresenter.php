<?php

namespace Modules\Container\Presenters;

use Modules\Container\Entites\Container;

interface GetContainerPresenter
{
    public function getOrThrowNotFound(int $id): Container;

    public function getOrThrowBadRequest(int $id): Container;
}
