<?php

namespace Modules\Container\Repositories;

use Modules\Container\Entites\ContainerElement;
use Modules\Container\Entites\Container;

interface ContainerRepository
{
    public function save(Container $container): void;

    public function get(int $id): ?Container;

    public function hasElement(Container $container, ContainerElement $element): bool;

    public function saveElement(ContainerElement $element): void;

    public function getLastPosition(int $containerId): ?int;

    public function getContainerWithDependenses(int $id): ?Container;
}
