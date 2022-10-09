<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Presenters\Internal;

use Modules\Internal\Container\Contracts\Containerable;
use Modules\Internal\Container\Entites\Container;
use Modules\Internal\Container\Enums\ContainerType;

final class InitWrapperContainer implements InitWrapperContainerPresenter
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
