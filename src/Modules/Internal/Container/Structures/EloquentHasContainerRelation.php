<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Structures;

use Illuminate\Database\Eloquent\Relations\MorphOne;

trait EloquentHasContainerRelation
{
    public function container(): MorphOne
    {
        return $this->morphOne(ContainerModel::class, 'containerable');
    }

    public function setContainer(Container $container): self
    {
        $this->container = $container;

        return $this;
    }

    public function getContainer(): Container
    {
        return $this->container;
    }
}
