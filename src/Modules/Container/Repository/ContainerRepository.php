<?php

namespace Modules\Container\Repository;

use Modules\Container\Structures\ContainerElementStructure;
use Modules\Container\Structures\ContainerStructure;

interface ContainerRepository
{
    public function save(ContainerStructure $container): void;

    public function push(ContainerStructure $container, ContainerElementStructure $element): void;

    public function getLastPosition(int $containerId): int;

    public function getContainer(int $id): ?ContainerStructure;

    public function getContainerWithDependenses(int $id): ?ContainerStructure;
}
