<?php

declare(strict_types=1);

namespace Modules\Container\Presenters\Elements;

use Modules\Container\Contracts\ContainerableElement;
use Modules\Container\Entites\Container;
use Modules\Container\Entites\ContainerElement;
use Modules\Container\Services\ContainerDispatcher;

final class AddElement
{
    public function __construct(
        private ContainerDispatcher $dispatcher,
    ) {}

    public function __invoke(Container $container, ContainerableElement $element): ContainerElement
    {
        return $this->dispatcher->setContainer($container)
            ->push($element);
    }
}
