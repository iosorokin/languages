<?php

declare(strict_types=1);

namespace Domain\Internal\Container\Presenters\Internal;

use Domain\Internal\Container\Contracts\Containerable;
use Domain\Internal\Container\Model\Container;
use Domain\Internal\Container\Enums\ContainerType;

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
