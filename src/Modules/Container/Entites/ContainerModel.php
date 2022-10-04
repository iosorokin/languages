<?php

declare(strict_types=1);

namespace Modules\Container\Entites;

use App\Base\Entity\EloquentHasDescription;
use App\Base\Entity\EloquentHasTitle;
use App\Base\Entity\Identify\EloquentId;
use App\Base\Entity\Timestamps\EloquentTimestamps;
use App\Extensions\Assert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Collection;
use Modules\Container\Contexts\ContainerState;
use Modules\Container\Contracts\Containerable;
use Modules\Container\Enums\ContainerType;

final class ContainerModel extends Model implements Container
{
    use EloquentId;
    use EloquentHasDescription;
    use EloquentHasTitle;
    use EloquentTimestamps;
    use ContainerState;

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
        return $this->hasMany(ContainerElementModel::class);
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
