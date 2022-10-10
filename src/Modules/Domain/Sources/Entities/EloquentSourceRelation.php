<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait EloquentSourceRelation
{
    public function source(): BelongsTo
    {
        return $this->belongsto(SourceModel::class);
    }

    public function setSource(Source $source): self
    {
        $this->source()->associate($source);

        return $this;
    }

    public function getSourceId(): int
    {
        return $this->source_id;
    }

    public function getSource(): Source
    {
        return $this->source;
    }
}
