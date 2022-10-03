<?php

namespace Modules\Container\Presenters\Internal;

use Modules\Container\Contracts\Containerable;
use Modules\Container\Entites\Container;

interface InitWrapperContainerPresenter
{
    public function __invoke(Containerable $containerable): Container;
}
