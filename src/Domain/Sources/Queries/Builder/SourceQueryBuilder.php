<?php

declare(strict_types=1);

namespace Domain\Sources\Queries\Builder;

use Illuminate\Database\Eloquent\Builder;
use Domain\Sources\Structures\Source;

final class SourceQueryBuilder
{
    protected Builder $query;

    public function new(): self
    {
        $this->query = Source::query();

        return $this;
    }

    public function whereUserId(int $id): self
    {
        $this->query->where('user_id', $id);

        return $this;
    }

    public function whereLanguageId(int $id): self
    {
        $this->query->where('language_id', $id);

        return $this;
    }

    public function query(): Builder
    {
        return $this->query;
    }
}
