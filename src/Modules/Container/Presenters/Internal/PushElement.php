<?php

declare(strict_types=1);

namespace Modules\Container\Presenters\Internal;

use Modules\Container\Contracts\ContainerableElement;
use Modules\Container\Entites\Container;
use Modules\Container\Entites\ContainerElement;
use Modules\Container\Services\Dispatcher\ContainerDispatcher;

final class PushElement implements PushElementPresenter
{
    public function __construct(
        private ContainerDispatcher $containerDispatcher,
    ) {}

    public function __invoke(int|Container $container, ContainerableElement $element): ContainerElement
    {
        $manipulator = $this->containerDispatcher->manipulate($container);
        $element = $manipulator->push($element);

        return $element;
    }
}
