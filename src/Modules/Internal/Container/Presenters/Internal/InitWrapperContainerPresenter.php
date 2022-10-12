<?php

namespace Modules\Internal\Container\Presenters\Internal;

use Modules\Internal\Container\Contracts\Containerable;
use Modules\Internal\Container\Structures\Container;

interface InitWrapperContainerPresenter
{
    public function __invoke(Containerable $containerable): Container;
}
