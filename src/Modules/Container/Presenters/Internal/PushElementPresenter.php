<?php

namespace Modules\Container\Presenters\Internal;

use Modules\Container\Contracts\ContainerableElement;
use Modules\Container\Entites\Container;
use Modules\Container\Entites\ContainerElement;

interface PushElementPresenter
{
    public function __invoke(int|Container $container, ContainerableElement $element): ContainerElement;
}
