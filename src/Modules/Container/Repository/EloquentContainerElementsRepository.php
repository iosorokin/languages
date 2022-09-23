<?php

declare(strict_types=1);

namespace Modules\Container\Repository;

use App\Extensions\Assert;
use Modules\Container\Structures\ContainerElementModel;
use Modules\Container\Structures\ContainerElementsStructure;

final class EloquentContainerElementsRepository
{
    public function save(ContainerElementsStructure $containerElement): void
    {
        Assert::isInstanceOf($containerElement, ContainerElementModel::class);
        $containerElement->save();
    }
}
