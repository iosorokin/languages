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
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Container\Contracts\Containerable;
use Modules\Container\Enums\ContainerType;

final class ContainerModel extends Model implements Container
{
    use EloquentId;
    use EloquentHasDescription;
    use EloquentHasTitle;
    use EloquentTimestamps;

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
}
