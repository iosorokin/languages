<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Structures;

use App\Base\Structures\EloquentHasDescription;
use App\Base\Structures\EloquentHasTitle;
use App\Base\Structures\Identify\EntityIntId;
use App\Base\Structures\Timestamps\EntityTimestamps;
use Illuminate\Support\Collection;
use Modules\Internal\Container\Contexts\ContainerState;

final class ContainerEntity implements Container
{
    use EntityIntId;
    use EloquentHasDescription;
    use EloquentHasTitle;
    use EntityTimestamps;
    use ContainerState;
    use EloquentHasContainerRelation;

    public function setContainerable(Containerable $containerable): self
    {
        Assert::isInstanceOf($containerable, Model::class);
        /** @var Model $containerable */
        $this->containerable()->associate($containerable);

        return $this;
    }

    public function getContainerable(): Containerable
    {
        return $this->containerable;
    }

    public function setType(ContainerType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getType(): ContainerType
    {
        return is_string($this->type) ? ContainerType::tryFrom($this->type) : $this->type;
    }

    public function elements(): HasMany
    {
        return $this->hasMany(ContainerElementModel::class, 'container_id');
    }

    public function addElement(ContainerElement $element): self
    {
        $this->elements->push($element);

        return $this;
    }

    public function setElements(Collection $elements): self
    {
        $this->elements = $elements;

        return $this;
    }

    public function getElements(): Collection
    {
        return $this->elements;
    }
}
