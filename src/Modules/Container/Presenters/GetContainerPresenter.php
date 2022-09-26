<?php

namespace Modules\Container\Presenters;

use Modules\Container\Structures\ContainerStructure;

interface GetContainerPresenter
{
    public function __invoke(int $id): ContainerStructure;
}
