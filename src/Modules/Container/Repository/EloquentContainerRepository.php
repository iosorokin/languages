<?php

declare(strict_types=1);

namespace Modules\Container\Repository;

use App\Extensions\Assert;
use Modules\Container\Structures\ContainerModel;
use Modules\Container\Structures\ContainerStructure;

final class EloquentContainerRepository implements ContainerRepository
{
    public function save(ContainerStructure $container): void
    {
        Assert::isInstanceOf($container, ContainerModel::class);

        $container->save();
    }
}
