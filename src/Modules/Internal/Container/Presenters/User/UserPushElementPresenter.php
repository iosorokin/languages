<?php

namespace Modules\Internal\Container\Presenters\User;

use Modules\Internal\Container\Entites\ContainerElement;

interface UserPushElementPresenter
{
    public function __invoke(array $attributes): ContainerElement;
}
