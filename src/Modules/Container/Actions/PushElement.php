<?php

declare(strict_types=1);

namespace Modules\Container\Actions;

use Modules\Container\Contracts\ContainerableElement;
use Modules\Container\Entites\Container;
use Modules\Container\Services\ContainerDispatcher;

final class PushElement
{
    public function __construct(
        private ContainerDispatcher $containerDispatcher,
    ) {}

    public function __invoke(Container $container, ContainerableElement $containerableElement)
    {
        $this->containerDispatcher->setContainer($container)
            ->push($containerableElement);
    }
}
