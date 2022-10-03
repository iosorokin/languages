<?php

namespace Modules\Container\Presenters;

use Modules\Container\Entites\Container;

interface GetContainerPresenter
{
    public function __invoke(int $id): Container;
}
