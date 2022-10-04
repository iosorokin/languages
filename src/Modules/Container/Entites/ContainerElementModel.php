<?php

declare(strict_types=1);

namespace Modules\Container\Entites;

use App\Base\Entity\Identify\EloquentId;
use App\Base\Entity\Timestamps\EloquentTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Container\Contracts\ContainerableElement;

final class ContainerElementModel extends Model implements ContainerElement
{
    use EloquentId;
    use EloquentHasContainerRelation;
    use EloquentTimestamps;

    public $table = 'container_elements';

    public function element(): MorphTo
    {
        return $this->morphTo();
    }

    public function setElement(ContainerableElement $element): self
    {
        /** @var ContainerableElement|Model $element */
        $this->element()->associate($element);

        return $this;
    }

    public function getElement(): ContainerableElement
    {
        return $this->element;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getPosition(): int
    {
        return $this->position;
    }
}
