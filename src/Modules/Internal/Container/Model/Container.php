<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Model;

use App\Base\Structure\EloquentHasDescription;
use App\Base\Structure\EloquentHasTitle;
use App\Base\Structure\Identify\IntId;
use App\Base\Structure\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Internal\Container\Contracts\Containerable;
use Modules\Internal\Container\Contracts\ContainerableElement;
use Modules\Internal\Container\Enums\ContainerType;

final class Container extends Model implements ContainerableElement, Containerable
{
    use IntId;
    use EloquentHasDescription;
    use EloquentHasTitle;
    use Timestamps;
    use HasContainer;

    protected $casts = [
        'type' => ContainerType::class,
    ];

    private ?int $lastPos;

    private int $count;

    public function containerable(): MorphTo
    {
        return $this->morphTo();
    }

    public function elements(): HasMany
    {
        return $this->hasMany(ContainerElement::class);
    }

    public function setLastPosition(?int $pos): self
    {
        $this->lastPos = $pos;

        return $this;
    }

    public function getLastPosition(): ?int
    {
        $lastPost = $this->elements()->first()->position ?? 1;

        return $this->lastPos ?? $lastPost;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }

    public function getCount(): int
    {
        $count = $this->elements()->count();

        return $this->count ?? $count;
    }
}
