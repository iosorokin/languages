<?php

declare(strict_types=1);

namespace Modules\Container\Presenters\Internal;

use Modules\Container\Contracts\Containerable;
use Modules\Container\Entites\Container;
use Modules\Container\Enums\ContainerType;
use Modules\Container\Actions\CreateContainer;

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
