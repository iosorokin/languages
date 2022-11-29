<?php

declare(strict_types=1);

namespace WIP\Internal\Container\Model;

use Core\Base\Structure\Identify\IntId;
use Core\Base\Structure\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

final class ContainerElement extends Model
{
    use IntId;
    use Timestamps;

    public function element(): MorphTo
    {
        return $this->morphTo();
    }

    public function container(): BelongsTo
    {
        return $this->belongsTo(Container::class);
    }
}
