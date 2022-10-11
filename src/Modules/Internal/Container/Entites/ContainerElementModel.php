<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Entites;

use App\Base\Entity\Identify\IntId;
use App\Base\Entity\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Internal\Container\Contracts\ContainerableElement;

final class ContainerElementModel extends Model implements ContainerElement
{
    use IntId;
    use Timestamps;

    public $table = 'container_elements';

    public function element(): MorphTo
    {
        return $this->morphTo();
    }

    public function container(): BelongsTo
    {
        return $this->belongsTo(ContainerModel::class);
    }

    public function setContainer(Container $container): self
    {
        /** @var Model $container */
        $this->container()->associate($container);

        return $this;
    }

    public function getContainer(): Container
    {
        return $this->container;
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
