<?php

namespace Modules\Container\Repository;

use Modules\Container\Entites\ContainerElement;
use Modules\Container\Entites\Container;

interface ContainerRepository
{
    public function save(Container $container): void;

    public function push(Container $container, ContainerElement $element): void;

    public function getLastPosition(int $containerId): int;

    public function getContainer(int $id): ?Container;

    public function getContainerWithDependenses(int $id): ?Container;
}
