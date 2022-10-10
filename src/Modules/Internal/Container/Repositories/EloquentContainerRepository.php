<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Repositories;

use Core\Services\Morph\Morph;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Modules\Domain\Sentences\Entities\SentenceModel;
use Modules\Internal\Container\Entites\Container;
use Modules\Internal\Container\Entites\ContainerElement;
use Modules\Internal\Container\Entites\ContainerElementModel;
use Modules\Internal\Container\Entites\ContainerModel;
use Modules\Internal\Container\Enums\ContainerType;

final class EloquentContainerRepository implements ContainerRepository
{
    public function save(Container $container): void
    {
        $container->save();
    }

    public function get(int $id): ?Container
    {
        /** @var ContainerModel $container */
        $container = ContainerModel::find($id);
        if ($container) {
            $this->loadElements($container);
        }

        return $container;
    }

    public function getChapter(int $id): ?Container
    {
        /** @var ContainerModel $container */
        $container = ContainerModel::query()
            ->where('containerable_type', Morph::getMorph(Container::class))
            ->where('type', ContainerType::Chapter->value)
            ->where('id', $id)
            ->first();
        if ($container) {
            $this->loadElements($container);
        }

        return $container;
    }

    public function getByContainerable(string $type, int $id): ?Container
    {
        /** @var ContainerModel $container */
        $container = ContainerModel::query()
            ->where('containerable_type', $type)
            ->where('containerable_id', $id)
            ->first();
        if ($container) {
            $this->loadElements($container);
        }

        return $container;
    }

    private function loadElements(Container $container): void
    {
        $container->with('elements');
        $container->setCount($container->getElements()->count());
        $container->setLastPosition($container->getElements()->last()?->getPosition());
    }

    public function hasElement(Container $container, ContainerElement $element): bool
    {
        return (bool)ContainerModel::query()
            ->whereHasMorph(
                'elements',
                [SentenceModel::class, ContainerModel::class],
                function (Builder $query) use ($element) {
                    $query->where('element_id', $element->getId())
                        ->where('element_type', Morph::getMorph($element));
                }
            )->first();
    }

    public function saveElement(ContainerElement $element): void
    {
        $element->save();
    }

    public function getLastPosition(int $containerId): ?int
    {
        return DB::query()
            ->select('position')
            ->from((new ContainerElementModel())->getTable())
            ->where('container_id', $containerId)
            ->orderBy('position')
            ->limit(1)
            ->first()
            ?->position;
    }

    public function getContainerWithDependenses(int $id): Container
    {
        /** @var ContainerModel $container */
        $container = ContainerModel::query()
            ->with('containerable')
            ->find($id);

        return $container;
    }
}
