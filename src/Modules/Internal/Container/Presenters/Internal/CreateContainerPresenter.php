<?php

namespace Modules\Internal\Container\Presenters\Internal;

use Modules\Internal\Container\Contracts\Containerable;
use Modules\Internal\Container\Structures\Container;

interface CreateContainerPresenter
{
    public function __invoke(Containerable $containerable, array $attributes): Container;
}
