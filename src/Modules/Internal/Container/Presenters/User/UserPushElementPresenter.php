<?php

namespace Modules\Internal\Container\Presenters\User;

use Modules\Internal\Container\Structures\ContainerElement;

interface UserPushElementPresenter
{
    public function __invoke(array $attributes): ContainerElement;
}
