<?php

declare(strict_types=1);

namespace Domain\Core\Sources\Queries\Builder;

use Domain\Core\Sources\Structures\Source;
use Illuminate\Database\Eloquent\Builder;

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