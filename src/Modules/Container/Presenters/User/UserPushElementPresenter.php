<?php

namespace Modules\Container\Presenters\User;

use Modules\Container\Entites\Container;

interface UserPushElementPresenter
{
    public function __invoke(array $attributes): Container;
}
