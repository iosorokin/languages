<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Presenters\Internal;

use Modules\Internal\Container\Contracts\ContainerableElement;
use Modules\Internal\Container\Entites\Container;
use Modules\Internal\Container\Entites\ContainerElement;
use Modules\Internal\Container\Services\Dispatcher\ContainerDispatcher;

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
