<?php

namespace Modules\Container\Presenters\User;

use Modules\Container\Entites\Container;
use Modules\Container\Entites\ContainerElement;

interface UserPushElementPresenter
{
    public function __invoke(array $attributes): ContainerElement;
}
