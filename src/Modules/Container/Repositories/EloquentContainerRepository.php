<?php

declare(strict_types=1);

namespace Modules\Container\Repositories;

use Core\Services\Morph\Morph;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Modules\Container\Entites\Container;
use Modules\Container\Entites\ContainerElement;
use Modules\Container\Entites\ContainerElementModel;
use Modules\Container\Entites\ContainerModel;
use Modules\Domain\Sentences\Entities\SentenceModel;

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
        $container->with('elements');
        $container->setCount($container->getElements()->count());
        $container->setLastPosition($container->getElements()->last()?->getPosition());

        return $container;
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
