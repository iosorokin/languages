<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Queries;

use Illuminate\Contracts\Database\Query\Builder;
use Modules\Domain\Sources\Queries\Builder\SourceQueryBuilder;

final class SourceQueryManger
{
    private SourceQueryBuilder $queryBuilder;

    public function setQueryBuilder(SourceQueryBuilder $queryBuilder): self
    {
        $this->queryBuilder = $queryBuilder;

        return $this;
    }

    public function isFirstUserSourceForLanguage(int $userId, int $languageId): Builder
    {
        return $this->queryBuilder
            ->whereUserId($userId)
            ->whereLanguageId($languageId);
    }
}
