<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Queries;

use Illuminate\Contracts\Database\Query\Builder;
use Modules\Core\Sources\Queries\Builder\SourceQueryBuilder;

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