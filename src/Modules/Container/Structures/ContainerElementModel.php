<?php

declare(strict_types=1);

namespace Modules\Container\Structures;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Container\Contracts\ContainerableElement;

final class ContainerElementModel extends Model implements ContainerElementsStructure
{
    protected $table = 'container_elements';

    private function container(): BelongsTo
    {
        return $this->belongsTo(ContainerModel::class);
    }

    private function element(): MorphTo
    {
        return $this->morphTo();
    }

    public function setContainer(ContainerStructure $container): self
    {
        $this->container()->associate($container);

        return $this;
    }

    public function getContainer(): ContainerStructure
    {
        return $this->container;
    }

    public function setElement(ContainerableElement $element): self
    {
        $this->element()->associate($element);

        return $this;
    }

    public function getElement(): ContainerableElement
    {
        return $this->element;
    }
}
