<?php

declare(strict_types=1);

namespace Modules\Container\Entites;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait EloquentHasContainerRelation
{
    public function container(): BelongsTo
    {
        return $this->belongsTo(ContainerModel::class);
    }

    public function setContainer(Container $container): self
    {
        $this->container()->associate($container);

        return $this;
    }

    public function getContainer(): Container
    {
        return $this->container;
    }
}
