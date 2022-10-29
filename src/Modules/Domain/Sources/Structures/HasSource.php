<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Structures;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasSource
{
    public function source(): BelongsTo
    {
        return $this->belongsto(Source::class);
    }
}
