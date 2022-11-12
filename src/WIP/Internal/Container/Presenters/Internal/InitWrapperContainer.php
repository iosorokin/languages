<?php

declare(strict_types=1);

namespace WIP\Internal\Container\Presenters\Internal;

use WIP\Internal\Container\Contracts\Containerable;
use WIP\Internal\Container\Enums\ContainerType;
use WIP\Internal\Container\Model\Container;

final class InitWrapperContainer
{
    public function __construct(
        private CreateContainer $createContainer,
    ) {}

    public function __invoke(Containerable $containerable): Container
    {
        $attributes['type'] = ContainerType::Wrapper->value;
        $container = ($this->createContainer)($containerable, $attributes);

        return $container;
    }
}
