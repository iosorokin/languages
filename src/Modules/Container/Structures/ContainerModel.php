<?php

declare(strict_types=1);

namespace Modules\Container\Structures;

use App\Extensions\Assert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Container\Contracts\Containerable;

final class ContainerModel extends Model implements ContainerStructure
{
    protected $table = 'containers';

    private function containerable(): MorphTo
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
}
