<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Structures;

use App\Base\Structures\EloquentHasDescription;
use App\Base\Structures\EloquentHasTitle;
use App\Base\Structures\Identify\IntId;
use App\Base\Structures\Timestamps\Timestamps;
use App\Extensions\Assert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Collection;
use Modules\Internal\Container\Contexts\ContainerState;
use Modules\Internal\Container\Contracts\Containerable;
use Modules\Internal\Container\Enums\ContainerType;

final class ContainerModel extends Model implements Container
{
    use IntId;
    use EloquentHasDescription;
    use EloquentHasTitle;
    use Timestamps;
    use ContainerState;
    use EloquentHasContainerRelation;

    protected $table = 'containers';

    public function containerable(): MorphTo
    {
        return $this->morphTo();
    }

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
