<?php

namespace Modules\Internal\Container\Presenters\Internal;

use Modules\Internal\Container\Contracts\ContainerableElement;
use Modules\Internal\Container\Entites\Container;
use Modules\Internal\Container\Entites\ContainerElement;

interface PushElementPresenter
{
    public function __invoke(int|Container $container, ContainerableElement $element): ContainerElement;
}
