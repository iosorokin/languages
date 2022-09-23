<?php

declare(strict_types=1);

namespace Modules\Container\Repository;

use App\Extensions\Assert;
use Illuminate\Support\Facades\DB;
use Modules\Container\Structures\ContainerElementModel;
use Modules\Container\Structures\ContainerElementStructure;
use Modules\Container\Structures\ContainerModel;
use Modules\Container\Structures\ContainerStructure;

final class EloquentContainerRepository implements ContainerRepository
{
    public function save(ContainerStructure $container): void
    {
        Assert::isInstanceOf($container, ContainerModel::class);

        $container->save();
    }

    public function push(ContainerStructure $container, ContainerElementStructure $element): void
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
}
