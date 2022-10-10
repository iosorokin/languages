<?php

namespace Modules\Internal\Container\Repositories;

use Modules\Internal\Container\Entites\Container;
use Modules\Internal\Container\Entites\ContainerElement;

interface ContainerRepository
{
    public function save(Container $container): void;

    public function get(int $id): ?Container;

    public function getByContainerable(string $type, int $id): ?Container;

    public function getChapter(int $id): ?Container;

    public function hasElement(Container $container, ContainerElement $element): bool;

    public function saveElement(ContainerElement $element): void;

    public function getLastPosition(int $containerId): ?int;

    public function getContainerWithDependenses(int $id): ?Container;
}
