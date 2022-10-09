<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Repositories;

use Illuminate\Support\Collection;
use Modules\Internal\Container\Entites\Container;
use Modules\Internal\Container\Entites\ContainerElement;

final class FakeContainerRepository implements ContainerRepository
{
    private static Collection $containters;

    private static Collection $elements;

    public function __construct()
    {
        static::$containters ?? static::reset();
        static::$elements ?? static::reset();
    }

    public static function reset(): void
    {
        static::$containters =  new Collection();
        static::$elements = new Collection();
    }

    public function save(Container $container): void
    {
        $id = static::$containters->count() + 1;
        $container->setId($id);
        static::$containters->push($container);
    }

    public function get(int $id): ?Container
    {
        /** @var Container|null $container */
        $container = static::$containters->where('id', $id)->first();

        if ($container) {
            $elements = static::$elements->where('container_id', $container->getId());
            $container->setElements($elements);
            $container->setLastPosition($elements->last()?->getPosition());
            $container->setCount($elements->count());
        }

        return $container;
    }

    public function getContainerWithDependenses(int $id): ?Container
    {
        // TODO: Implement getContainerWithDependenses() method.
    }

    public function getLastPosition(int $containerId): ?int
    {
        $container = $this->get($containerId);
        $elements = $container->getElements();
        /** @var ContainerElement|null $last */
        $last = $elements->last();

        return $last?->getPosition();
    }

    public function hasElement(Container $container, ContainerElement $element): bool
    {
        // TODO: Implement hasElement() method.
    }

    public function saveElement(ContainerElement $element): void
    {
        $id = static::$elements->count() + 1;
        $element->setId($id);
        static::$elements->push($element);
    }
}
