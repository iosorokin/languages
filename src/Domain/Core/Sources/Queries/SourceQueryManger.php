<?php

declare(strict_types=1);

namespace Domain\Core\Sources\Queries;

use Domain\Core\Sources\Queries\Builder\SourceQueryBuilder;
use Illuminate\Contracts\Database\Query\Builder;

final class SourceQueryManger
{
    public function __construct(
        private SourceQueryBuilder $queryBuilder,
    ) {}

    public function isFirstUserSourceForLanguage(int $userId, int $languageId): Builder
    {
        return $this->queryBuilder->new()
            ->whereUserId($userId)
            ->whereLanguageId($languageId)
            ->query();
    }
}
