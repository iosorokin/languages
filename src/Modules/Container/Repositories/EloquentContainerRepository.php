<?php

declare(strict_types=1);

namespace Modules\Container\Repositories;

use App\Extensions\Assert;
use Illuminate\Support\Facades\DB;
use Modules\Container\Entites\ContainerElementModel;
use Modules\Container\Entites\ContainerElement;
use Modules\Container\Entites\ContainerModel;
use Modules\Container\Entites\Container;

final class EloquentContainerRepository implements ContainerRepository
{
    public function save(Container $container): void
    {
        $container->save();
    }

    public function push(Container $container, ContainerElement $element): void
    {
        $element->setContainer($container);
        $element->save();
    }

    public function getLastPosition(int $containerId): int
    {
        return DB::query()
            ->select('position')
            ->from((new ContainerElementModel())->getTable())
            ->where('container_id', $containerId)
            ->orderBy('position')
            ->limit(1)
            ->first()
            ->position;
    }

    public function getContainer(int $id): ?Container
    {
        /** @var ContainerModel $container */
        $container = ContainerModel::query()
            ->find($id);

        return $container;
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
