<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Repositories;

use Core\Services\Morph\Morph;
use Illuminate\Support\Collection;
use Modules\Internal\Container\Structures\Container;
use Modules\Internal\Container\Structures\ContainerElement;
use Modules\Internal\Container\Enums\ContainerType;

final class FakeContainerRepository implements ContainerRepository
{
    private static Collection $containters;

    public function __construct()
    {
        static::$containters ?? static::reset();
    }

    public static function reset(): void
    {
        static::$containters =  new Collection();
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
        $container = static::$containters
            ->where('id', $id)
            ->first();

        if ($container) {
            $this->loadElements($container);
        }

        return $container;
    }

    public function getByContainerable(string $type, int $id): ?Container
    {
        /** @var Container|null $container */
        $container = static::$containters
            ->where('containerable_type', $type)
            ->where('containerable_id', $id)
            ->first();

        if ($container) {
            $this->loadElements($container);
        }

        return $container;
    }

    public function getChapter(int $id): ?Container
    {
        /** @var Container|null $container */
        $container = static::$containters
            ->where('containerable_type', Morph::getMorph(Container::class))
            ->where('type', ContainerType::Chapter->value)
            ->where('id', $id)
            ->first();

        if ($container) {
            $this->loadElements($container);
        }

        return $container;
    }

    private function loadElements(Container $container): void
    {
        $elements = $container->getElements();
        $container->setLastPosition($elements->last()?->getPosition());
        $container->setCount($elements->count());
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
        // элемент добавляется в контейнер из теста, сохранять снова не требуется
    }
}
